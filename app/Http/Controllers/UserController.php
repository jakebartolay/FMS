<?php
namespace App\Http\Middleware;
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use App\Models\Account;
use App\Models\Investments;
use App\Models\DepositRequest;
use App\Models\InvestmentRequest;
use App\Models\Transferhistory;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Events\TransferEvent;
use App\Models\Payouts;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class UserController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        $activeNavItem = 'dashboard';
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }

        $investments = Investments::where('user_id', auth()->id())
            ->orderBy('created_at')
            ->pluck('amount')
            ->toArray();
            

        // // Pass the investment data to the chart configuration
        $chartData = json_encode($investments);

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $id = $user->id; // Assuming the primary key of the users table is `id`

        // $invest = InvestmentRequest::where('user_id', auth()->id())
        // ->whereNotIn('status', [3, 10])
        // ->count();
    

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id') // Join on the primary key of the users table
            ->where('accounts.user_id', $id)
            ->value('accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        $activityLog = DB::table('activity_logs')->get();

        // $user = auth()->user(); // Assuming you're fetching the authenticated user
        // $id = $user->id; // Assuming the primary key of the users table is `id`
        
        // // Count the number of payouts associated with the authenticated user
        // $payoutcount = Payouts::where('user_id', $id)->count();
        
        // // Sum the amounts of payouts associated with the authenticated user
        // $payouts = Payouts::where('user_id', $id)->count();
        

        // ////PAYOUTS

        // $payoutAmounts = Payouts::where('user_id', auth()->id())
        // ->orderBy('created_at')
        // ->pluck('amount')
        // ->toArray();
    
        // // Pass the investment data to the chart configuration
        // $payout = json_encode($payoutAmounts);
        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $id = $user->id; // Assuming the primary key of the users table is `id`
        
        // Count the number of investments associated with the authenticated user
        $invest = Investments::where('user_id', $id)->count();
        $payout = Payouts::where('user_id', $id)->count();
        
        // Now $count contains the total number of investments for the authenticated user
        
    


        // return view('user.dashboard', compact('user', 'activeNavItem' , 'activityLog', 'roleName','payout',
        // 'formattedBalance', 'invest', 'chartData','payouts','payoutcount'));
        
        return view('user.dashboard', compact('user','roleName','activeNavItem','chartData','invest','payout','formattedBalance'));
    }

    public function Error()
    {
        return view('layout.error');
    }
    // Activity Log
    public function activityLoginLogout()
    {
        // Get the ID of the currently authenticated user
        $userId = auth()->user();

        // Fetch activity logs for the authenticated user
        $activityLog = DB::table('activity_logs')
            ->where('user_id', $userId)
            ->get();

        return view('dashboard', compact('activityLog'));
    }
    public function Profile()
    {
        $activeNavItem = '';
        $user = auth()->user();

        $userRole = Role::find($user->role);
        
        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }
       
        $id = $user->id;
        $accountData = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $id)
            ->select('accounts.id as account_id', 'accounts.status')
            ->first();
        
        $accountId = $accountData->account_id;
        $accountStatus = $accountData->status;
        
        return view('user.sidebar.profile', compact('user', 'activeNavItem', 'roleName', 'accountId', 'accountStatus'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }
        $user = auth()->user();
        return view('user.sidebar.profile', compact('user', 'roleName'));
    }

    public function Transaction()
    {
        $activeNavItem = 'transaction';
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }
        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $id = $user->id; // Assuming the primary key of the users table is `id`

        // $user = auth()->user(); // Assuming you're fetching the authenticated user
        // $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id') // Join on the primary key of the users table
            ->where('accounts.user_id', $id)
            ->value('accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places
        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `id` attribute of the user model
        
        // Retrieve transfer history records for the authenticated user
        $transferhistory = DB::table('transferhistory')
            ->join('users', 'users.id', '=', 'transferhistory.user_id')
            ->join('accounts', 'accounts.user_id', '=', 'users.id')
            ->select('transferhistory.*', 'users.*', 'accounts.balance', 'accounts.id as account_id', 'transferhistory.id as transfer_id') // Alias the transferhistory.id column as transfer_id
            ->where('transferhistory.user_id', $userId)
            ->get();

        $user = auth()->user();
        return view('user.sidebar.transaction', compact('user', 'activeNavItem', 'roleName', 'formattedBalance', 'transferhistory'));
    }

    public function transferForm(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }
        return view('user.deposit.transfer', compact('user','roleName'));
    }

    public function transfer(Request $request)
    {
                // Validation
                $request->validate([
                    'id' => 'required|exists:accounts,id',
                    'amount' => 'required|numeric|min:7',
                ]);
                
                // Retrieve sender's account
                $senderAccount = auth()->user()->accounts()->first();

                // Check if sender's account exists
                if ($senderAccount) {
                    // Check if sender has sufficient balance
                    if ($senderAccount->balance < $request->amount) {
                        return back()->with('error', 'Insufficient balance to transfer.');
                    }

                    // Retrieve recipient's account
                    $recipientAccount = Account::findOrFail($request->id);

                    // Check if recipient's account ID is the same as sender's account ID
                    if ($recipientAccount->user_id === $senderAccount->user_id) {
                        return back()->with('error', 'You cannot transfer money to your own account.');
                    }

                    // Perform balance deduction from sender's account
                    $senderAccount->balance -= $request->amount;

                    // Retrieve sender's details directly from the authenticated user
                    $sender = auth()->user();

                    // Create a new transfer history record
                    $transferHistory = new TransferHistory();
                    $transferHistory->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
                    $transferHistory->firstname = $sender->firstname; // Assuming 'firstname' is the field name in the User model
                    $transferHistory->lastname = $sender->lastname; // Assuming 'lastname' is the field name in the User model
                    $transferHistory->sender_id = $senderAccount->id;
                    $transferHistory->recipient_id = $recipientAccount->id;
                    $transferHistory->amount = $request->amount;
                    $transferHistory->type = 'success'; // Assign a default role value
                    $transferHistory->save();
                    

                    // Perform balance addition to recipient's account
                    $recipientAccount->balance += $request->amount;

                    // Save changes to sender's and recipient's accounts
                    $senderAccount->save();
                    $recipientAccount->save();

                    // Return response
                    event(new TransferEvent($transferHistory));
                    return redirect()->route('transaction')->with('success', 'Transfer updated successfully');
                } else {
                    return back()->with('error', 'Sender account not found.');
                }


        // // Validation
        // $request->validate([
        //     'id' => 'required|exists:accounts,id',
        //     'amount' => 'required|numeric|min:7',
        // ]);

        // // Retrieve sender's account
        // $senderAccount = auth()->user()->accounts()->first();

        // // Check if sender's account exists
        // if (!$senderAccount) {
        //     return back()->with('error', 'Sender account not found.');
        // }

        // // Check if sender has sufficient balance
        // if ($senderAccount->balance < $request->amount) {
        //     return back()->with('error', 'Insufficient balance to transfer.');
        // }

        // // Retrieve recipient's account
        // $recipientAccount = Account::findOrFail($request->id);

        // // Check if recipient's account ID is the same as sender's account ID
        // if ($recipientAccount->id === $senderAccount->id) {
        //     return back()->with('error', 'You cannot transfer money to your own account.');
        // }

        // // Perform balance deduction from sender's account
        // $senderAccount->balance -= $request->amount;

        // // Create a new transfer history record
        // $transferHistory = new TransferHistory();
        // $transferHistory->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
        // $transferHistory->sender_id = $senderAccount->id;
        // $transferHistory->recipient_id = $recipientAccount->id;
        // $transferHistory->amount = $request->amount;
        // $transferHistory->role = '0'; // Assign a default role value
        // $transferHistory->save();

        // // Perform balance addition to recipient's account
        // $recipientAccount->balance += $request->amount;

        // // Save changes to sender's and recipient's accounts
        // $senderAccount->save();
        // $recipientAccount->save();

        // // Return response
        // return redirect()->route('transaction')->with('success', 'Transfer updated successfully');



        // // Validation
        // $request->validate([
        //     'id' => 'required|exists:accounts,id',
        //     'amount' => 'required|numeric|min:1',
        // ]);

        // // Retrieve sender's account
        // $senderAccount = auth()->user()->accounts()->first();
        // Log::debug('Sender Account ID: ' . ($senderAccount ? $senderAccount->id : 'Not found'));

        // // Check if sender's account exists
        // if (!$senderAccount) {
        //     return back()->with('error', 'Sender account not found.');
        // }

        // // Check if sender has sufficient balance
        // if ($senderAccount->balance < $request->amount) {
        //     return back()->with('error', 'Insufficient balance to transfer.');
        // }

        // // Retrieve recipient's account
        // $recipientAccount = Account::findOrFail($request->id);

        // // Check if recipient's account ID is the same as sender's account ID
        // if ($recipientAccount->id === $senderAccount->id) {
        //     return back()->with('error', 'You cannot transfer money to your own account.');
        // }

        // // Perform balance deduction from sender's account
        // $senderAccount->balance -= $request->amount;

        // // Create a new transfer history record
        // $transferHistory = new TransferHistory();
        // $transferHistory->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
        // $transferHistory->sender_id = $senderAccount->id;
        // $transferHistory->recipient_id = $recipientAccount->id;
        // $transferHistory->amount = $request->amount;
        // $transferHistory->role = '0'; // Assign a default role value
        // $transferHistory->save();

        // // Perform balance addition to recipient's account
        // $recipientAccount->balance += $request->amount;

        // // Save changes to sender's and recipient's accounts
        // $senderAccount->save();
        // $recipientAccount->save();

        // // Return response
        // return redirect()->route('transaction')->with('success', 'Transfer updated successfully');

    }

    public function Wallet()
    {
        $activeNavItem = 'wallet';
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model

        // $invest = InvestmentRequest::where('user_id', auth()->id())
        // ->where('status', '<>', 10)
        // ->count();

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $userId)
            ->value('accounts.balance');


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places


        // Retrieve the currently authenticated user
        $user = auth()->user();

        $transactions = Transaction::where('user_id', $user->id)->get();


        // Join the `accounts` table with the `users` table using the `user_id` foreign key
        // $depositrequest = depositrequest::join('investment_statuses', 'investment_statuses.id', '=', 'depositrequest.status')
        //     ->join('users', 'users.id', '=', 'depositrequest.user_id')
        //     ->where('users.id', $id) // Filter the deposit requests by the user's ID
        //     ->select('depositrequest.*', 'investment_statuses.name as status_name', 'users.firstname as firstname', 'users.lastname as lastname')
        //     ->get();

        // $payouts = Payouts::count();

        // return view('user.sidebar.wallet', compact('user','activeNavItem', 'depositrequest', 'formattedBalance', 'roleName','invest','payouts'));
        return view('user.sidebar.wallet', compact('user','activeNavItem', 'formattedBalance', 'roleName','transactions'));
    }

    public function paypal()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $id = $user->id; // Assuming the primary key of the users table is `id`

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id') // Join on the primary key of the users table
            ->where('accounts.user_id', $id)
            ->value('accounts.balance');


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        return view('user.deposit.paypal', compact('user', 'formattedBalance', 'roleName'));
    }

    public function deposit(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0.01|max:10000', // Adjust the validation rules as needed
        ]);
    
        // Process the deposit
        try {

            // Retrieve the authenticated user
            $user = Auth::user();

            // Check if the user has an associated account
            if ($user->user_id) {
                // If an account exists, get the user_id and update the balance
                $user_id = $user->user_id;
                $account = Account::where('user_id', $user_id)->first(); // Retrieve the account record
                if ($account) {
                    $account->balance += $validatedData['amount'];
                    $account->save();
                } else {
                    // Log an error if no account is found for the user
                    \Log::error('Attempt to deposit to a non-existent account for user: ' . $user_id);
                    // Return a response or redirect the user with an error message
                    return redirect()->back()->with('error', 'Failed to deposit. No account found.');
                }
            } else {
                // Log an error if the user does not have a user_id
                \Log::error('User does not have a user_id: ' . $user->id);
                // Return a response or redirect the user with an error message
                return redirect()->back()->with('error', 'Failed to deposit. User does not have a user_id.');
            }

            // Create a deposit transaction record
            Transaction::create([
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'amount' => $validatedData['amount'],
                'type' => 'Deposit',
                // Add any other relevant fields to the transaction record
            ]);

            // Commit the transaction
            \DB::commit();

            // Redirect back with a success message
            return redirect()->route('wallet')->with('success', 'Deposit successful.');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            \DB::rollBack();
    
            // Log the error for debugging
            \Log::error('Deposit failed: ' . $e->getMessage());
            dd($validatedData);
            // Redirect back with an error message
            return Redirect::back()->with('error', 'An error occurred while processing your deposit. Please try again later.');
        }
    }

    public function showContact()
    {
        $activeNavItem = 'contractsupport';
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }
        return view('user.sidebar.contactsupport', compact('user','activeNavItem','roleName'));
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'text' => $request->input('text')
        ];
        
        Mail::send('user.sidebar.sendingmail', $data, function ($message) use ($request){
            $message->from($request->input('email'), $request->input('name'));
            $message->to('jakebartolay147@gmail.com');
            $message->subject('Sent Throught Contact Us');
        });
        
        return redirect()->back()->with('success', 'Email Successfully Send!');
    }

    // public function Depositt(Request $request)
    // {
    //     $request->validate([
    //         'amount' => 'required|numeric',
    //     ]);
        
    //     $user = auth()->user();
    //     $amount = $request->amount;
        
    //     // Create a new deposit request
    //     $depositRequest = new depositrequest();
    //     $depositRequest->user_id = $user->id;
    //     $depositRequest->amount = $amount;
    //     $depositRequest->status = '3'; // Initial status is pending
    //     // dd($depositRequest);
    //     $depositRequest->save();
        
    //     // Log the deposit request or notify admin for approval
        
    //     // Redirect back to the wallet page with a success message
    //     return redirect()->route('wallet')->with('success', 'Deposit request submitted successfully. It will be processed after approval.');
    // }

    public function Investment()
    {
        $activeNavItem = 'investment';
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }

        $user = auth()->user();

        // Retrieve investments associated with the authenticated user
        $invest = Investments::where('user_id', $user->id)->get();
        
        return view('user.sidebar.investment', compact('invest', 'activeNavItem', 'user', 'roleName'));
        
    }
    public function invest()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        } 

        return view('user.deposit.investments', compact('user', 'roleName'));
    }

    public function InvestmentRequest(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1|max:100000',
            'investment_date' => 'required|date'
        ]);
        
        // Retrieve the authenticated user
        $user = auth()->user();
        
        // Check if the user has sufficient balance
        $account = Account::where('user_id', $user->id)->first();
        if (!$account || $account->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance. Please deposit funds first.');
        }
        
        // Calculate tax amount (assuming tax_rate is a fixed percentage)
        $taxRate = 0.05; // Example tax rate of 5%
        $taxAmount = $request->amount * $taxRate;
        
        // Calculate total amount including tax
        $totalAmount = $request->amount + $taxAmount;
        
        // Create the investment request
        $investment = new Investments();
        $investment->user_id = $user->id;
        $investment->firstname = $user->firstname;
        $investment->lastname = $user->lastname;
        $investment->amount = $totalAmount; // Save total amount including tax
        $investment->tax_amount = $taxAmount; // Save tax amount separately
        $investment->investment_date = $request->investment_date;
        $investment->type = 'Investment'; // Assuming type is passed in the request
        $investment->save();
        
        // Update the user's account balance
        $account->balance -= $totalAmount; // Deduct total amount including tax
        $account->save();
        
        // Redirect back with a success message
        return back()->with('success', 'Investment request submitted successfully. It will be processed after approval.');
             
    }
    

    public function Investmentcancel(Request $request, $id)
    {
      
        // Find the investment request by its ID
        $investmentRequest = InvestmentRequest::findOrFail($id);

        // Update the status of the investment request to cancelled
        $investmentRequest->status = 10; // Assuming '10' represents a cancelled status
        $investmentRequest->save();

        // Retrieve the associated investment record
        $account = account::where('user_id', $investmentRequest->user_id)->first();

        // Check if the associated investment record exists
        if ($account) {
            // Add the canceled amount back to the user's account balance
            $account->amount += $investmentRequest->amount; // Assuming amount is the canceled amount
            $account->save();
        } else {
            // This should not happen ideally because if an investment request exists, there should be an associated account
            return redirect()->route('investment')->with('error', 'No account found for the user.');
        }

        return redirect()->route('investment')->with('success', 'Your investment has been cancelled and the amount has been returned to your account.');
    }

    public function Withdrawals()
    {
        $activeNavItem = 'withdrawals';
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $userId)
            ->value('accounts.balance');

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model
            
        $payouts = Payouts::where('user_id', $userId)->get();


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places
        return view('user.sidebar.withdrawal', compact('user','activeNavItem','payouts', 'roleName', 'formattedBalance'));
    }

    public function payoutGateways(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }

        return view('user.deposit.payoutgate', compact('user', 'roleName'));
    }
    
    public function payout(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Investor';
        }

        return view('user.deposit.paypalpayouts', compact('user', 'roleName'));
    }

    public function processPayout(Request $request)
    {
        // Validate the request
        $request->validate([
            'amount' => 'required|numeric|min:0|max:1000000',
        ]);
        
        // Retrieve the authenticated user
        $user = auth()->user();
    
        // Check if the user has an associated account
        $account = Account::where('user_id', $user->id)->first();
    
        if (!$account) {
            return back()->with('error', 'No account found for the user.');
        }
    
        // Check if the user has sufficient balance for the payout
        if ($account->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance for the payout.');
        }
    
        // Deduct the amount from the user's account balance
        $account->balance -= $request->amount;
        $account->save();

        // Record the payout
        $payout = new Payouts();
        $payout->user_id = $user->id;
        $payout->firstname = $user->firstname; // Assuming these fields are present in the user model
        $payout->lastname = $user->lastname;
        $payout->email = $user->email;
        $payout->amount = $request->amount;
        $payout->status = 'success';
        // dd($payout);
        $payout->save();
        return redirect()->route('withdrawals')->with('success', 'Payout successful.');
    }
    
    public function updateProfile(Request $request)
    {

        // Retrieve the authenticated user
        $user = Auth::user();
        
        // Validate the request
        $request->validate([
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'email' => 'required|string|email|max:100|unique:users,email,' . ($user ? $user->id : 'NULL'),
            'age' => 'required|integer|min:18',
            'birthdate' => 'required|date', // Adjust the validation rule for birthday as needed
        ]);
        
        // Update the authenticated user's profile if $user is defined
        if ($user) {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->age = $request->age;
            $user->birthdate = $request->birthdate;
            $user->save();
        
            return back()->with('success', 'Information has been updated successfully.');
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'User not authenticated.');
        }
        
    }

    public function updatePassword(Request $request)
    {
                // $request->validate([
            //     'current_password' => 'required|min:6|max:100',
            //     'new_password' => 'required|min:6|max:100',
            //     'new_password_confirmation' => 'required|same:new_password',
            // ]);

            // $current_user = auth()->user();

            // if (Hash::check($request->current_password, $current_user->password)) {
            //     $current_user->update([
            //         'password' => bcrypt($request->new_password)
            //     ]);
            //     return redirect()->back()->with('success', 'Password successfully updated.');
            // } else {
            //     return redirect()->back()->with('error', 'Current password is incorrect.');
            // }

        // Validate the form data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get the current user
        $user = auth()->user();

        // Check if the user's password was set automatically
        if ($user->password === bcrypt('12345dummy')) {
            // Password was set automatically, no need to verify current password
            $user->password = bcrypt($request->new_password);
            $user->save();
            
            return redirect()->back()->with('success', 'Password updated successfully!');
        }

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        // Update the password
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function createUsers(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'firstname' => 'required|string|min:15',
            'lastname' => 'required|string|min:15',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user->id,
            'password' => 'required|string|min:15',
            'role' => 'required'
        ]);

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Created Account has been successfull.');
    }

    public function maintenance(){
        return view('layout/maintenance');
    }
}