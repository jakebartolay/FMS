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
use App\Models\fms10_accounts;
use App\Models\fms10_companybudget;
use App\Models\fms10_investments;
use App\Models\fms10_transferhistory;
use App\Models\fms10_transactionhistory;
use App\Models\fms10_transactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\fms10_activity_logs;
use App\Events\TransferEvent;
use App\Models\fms10_payouts;
use App\Models\fms10_earnings;
use Closure;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use function App\Http\Controllers\generateRandomString;

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

        $investments = fms10_investments::where('user_id', auth()->id())
            ->orderBy('created_at')
            ->pluck('amount')
            ->toArray();

        // // Pass the investment data to the chart configuration
        $chartData = json_encode($investments);

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $id = $user->id; // Assuming the primary key of the users table is `id`


        $account = DB::table('fms10_accounts')
            ->join('users', 'users.id', '=', 'fms10_accounts.user_id') // Join on the primary key of the users table
            ->where('fms10_accounts.user_id', $id)
            ->value('fms10_accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        $activityLog = DB::table('fms10_activity_logs')->get();

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $id = $user->id; // Assuming the primary key of the users table is `id`
        
        // Count the number of investments associated with the authenticated user
        $invest = fms10_investments::where('user_id', $id)->count();
        $payout = fms10_payouts::where('user_id', $id)->count();

        $earninsss = DB::table('fms10_earnings')
        ->where('user_id', $id)
        ->sum('amount');

        $earnings = number_format($earninsss, 2); 

        $withdrawal = fms10_payouts::where('user_id', auth()->id())
        ->orderBy('created_at')
        ->pluck('amount')
        ->toArray();

        // // Pass the investment data to the chart configuration
        $chartData2 = json_encode($withdrawal);

        $payouts = fms10_payouts::where('user_id', $id)->sum('amount');

        $payout2 = number_format($payouts, 2);
    
        
        return view('user.dashboard', compact('user','payout2','chartData2','earnings','roleName','activeNavItem','chartData','invest','payout','formattedBalance'));
    }

    public function downloadPdf($id)
    {
        $payout = fms10_payouts::findOrFail($id);
    
        // Initialize Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Load HTML content into Dompdf
        $view = view('user.deposit.receipt', compact('payout'));
        $html = $view->render();
        $dompdf->loadHtml($html);
    
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');
    
        // Render PDF
        $dompdf->render();
    
        // Download PDF
        return $dompdf->stream('receipt.pdf');
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

        $accountId = null;
        $accountStatus = null;
        $accountData = DB::table('fms10_accounts')
        ->join('users', 'users.id', '=', 'fms10_accounts.user_id')
        ->where('fms10_accounts.user_id', $id)
        ->select('fms10_accounts.id as account_id', 'fms10_accounts.status')
        ->first();
    
        if ($accountData) {
            $accountId = $accountData->account_id;
            $accountStatus = $accountData->status;
        }
    

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

        $account = DB::table('fms10_accounts')
            ->join('users', 'users.id', '=', 'fms10_accounts.user_id') // Join on the primary key of the users table
            ->where('fms10_accounts.user_id', $id)
            ->value('fms10_accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places
        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `id` attribute of the user model
        
        // Retrieve transfer history records for the authenticated user
        $transferhistory = DB::table('fms10_transferhistory')
            ->join('users', 'users.id', '=', 'fms10_transferhistory.user_id')
            ->join('fms10_accounts', 'fms10_accounts.user_id', '=', 'users.id')
            ->select('fms10_transferhistory.*', 'users.*', 'fms10_accounts.balance', 'fms10_accounts.id as account_id', 'fms10_transferhistory.id as transfer_id') // Alias the transferhistory.id column as transfer_id
            ->where('fms10_transferhistory.user_id', $userId)
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
            'id' => 'required|exists:fms10_accounts,id',
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
            $recipientAccount = fms10_accounts::findOrFail($request->id);
    
            // Check if recipient's account ID is the same as sender's account ID
            if ($recipientAccount->user_id === $senderAccount->user_id) {
                return back()->with('error', 'You cannot transfer money to your own account.');
            }
    
            // Calculate tax amount (for example, 10%)
            $taxRate = 0.1;
            $taxAmount = $request->amount * $taxRate;
    
            // Calculate total amount to send (including tax)
            $totalAmountToSend = $request->amount + $taxAmount;
    
            // Perform balance deduction from sender's account (including tax)
            $senderAccount->balance -= $totalAmountToSend;
            $senderAccount->save();
    
            // Retrieve sender's details directly from the authenticated user
            $sender = auth()->user();
    
            // Create a transaction record for tax
            $transactionTax = new fms10_companybudget();
            $transactionTax->user_id = $sender->id;
            $transactionTax->budget = $taxAmount; // Save the tax amount in the transaction record
            $transactionTax->description = 'Transfer Fee'; // Adjust the type as needed
            $transactionTax->save();
    
            // Create a transfer history record
            $transferHistory = new fms10_transferhistory();
            $transferHistory->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
            $transferHistory->firstname = $sender->firstname; // Assuming 'firstname' is the field name in the User model
            $transferHistory->lastname = $sender->lastname; // Assuming 'lastname' is the field name in the User model
            $transferHistory->sender_id = $senderAccount->id;
            $transferHistory->recipient_id = $recipientAccount->id;
            $transferHistory->amount = $request->amount;
            $transferHistory->type = 'Successful'; // Assign a default role value
            $transferHistory->save();

            $transactionHistory = new fms10_transactionhistory();
            $transactionHistory->user_id = auth()->id();
            $transactionHistory->firstname = $senderAccount->firstname;
            $transactionHistory->lastname = $senderAccount->lastname;
            $transactionHistory->amount = $request->amount; // Use the validated amount from the request
            $transactionHistory->description = 'Transfer Money'; // Adjust the description as needed
            $transactionHistory->type = 'Transfer Money'; // Adjust the type as needed
            $transactionHistory->save();
    
            // Perform balance addition to recipient's account
            $recipientAccount->balance += $request->amount;
            $recipientAccount->save();
    
            // Return response
            return redirect()->route('transaction')->with('success', 'Transfer updated successfully');
        } else {
            return back()->with('error', 'Sender account not found.');
        }
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

        $account = DB::table('fms10_accounts')
            ->join('users', 'users.id', '=', 'fms10_accounts.user_id')
            ->where('fms10_accounts.user_id', $userId)
            ->value('fms10_accounts.balance');


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places


        // Retrieve the currently authenticated user
        $user = auth()->user();

        $transactions = fms10_transactions::where('user_id', $user->id)->get();


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

        $account = DB::table('fms10_accounts')
            ->join('users', 'users.id', '=', 'fms10_accounts.user_id') // Join on the primary key of the users table
            ->where('fms10_accounts.user_id', $id)
            ->value('fms10_accounts.balance');


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        return view('user.deposit.paypal', compact('user', 'formattedBalance', 'roleName'));
    }

    public function deposit(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0.01|max:10000', // Adjust the validation rules as needed
        ]);
        
        // Begin the database transaction
        \DB::beginTransaction();
        
        try {
            // Retrieve the authenticated user
            $user = Auth::user();
        
            // Check if the user has an associated account
            if ($user->user_id) {
                // If an account exists, get the user_id and update the balance
                $user_id = $user->user_id;
                $account = fms10_accounts::where('user_id', $user_id)->first(); // Retrieve the account record
                if ($account) {
                    $account->balance += $validatedData['amount'];
                    $account->save();
                } else {
                    // Log an error if no account is found for the user
                    \Log::error('Attempt to deposit to a non-existent account for user: ' . $user_id);
                    // Rollback the transaction and return with an error message
                    \DB::rollBack();
                    return redirect()->back()->with('error', 'Failed to deposit. No account found.');
                }
            } else {
                // Log an error if the user does not have a user_id
                \Log::error('User does not have a user_id: ' . Auth::id());
                // Rollback the transaction and return with an error message
                \DB::rollBack();
                return redirect()->back()->with('error', 'Failed to deposit. User does not have a user_id.');
            }
        
            // Create a deposit transaction record
            fms10_transactions::create([
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'amount' => $validatedData['amount'], // Use the validated amount from the request
                'type' => 'Paypal',
                // Add any other relevant fields to the transaction record
            ]);
        
            // Create a transaction history record
            $transactionHistory = new fms10_transactionhistory();
            $transactionHistory->user_id = $user->id;
            $transactionHistory->firstname = $user->firstname;
            $transactionHistory->lastname = $user->lastname;
            $transactionHistory->amount = $validatedData['amount']; // Use the validated amount from the request
            $transactionHistory->description = 'Deposit'; // Adjust the description as needed
            $transactionHistory->type = 'Paypal'; // Adjust the type as needed
            $transactionHistory->save();
        
            // Commit the transaction
            \DB::commit();
        
            // Redirect back with a success message
            return redirect()->route('wallet')->with('success', 'Deposit successful.');
        
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            \DB::rollBack();
        
            // Log the error for debugging
            \Log::error('Deposit failed: ' . $e->getMessage());
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
        $invest = fms10_investments::where('user_id', $user->id)->get();
        
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
        $account = fms10_accounts::where('user_id', $user->id)->first();
        if (!$account || $account->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance. Please deposit funds first.');
        }
        
        // Calculate tax amount (assuming tax_rate is a fixed percentage)
        $taxRate = 0.05; // Example tax rate of 5%
        $taxAmount = $request->amount * $taxRate;
        
        // Calculate total amount including tax
        $totalAmount = $request->amount + $taxAmount;
    
        // Calculate fee amount (assuming fee_rate is a fixed percentage)
        $feeRate = 0.02; // Example fee rate of 2%
        $feeAmount = $request->amount * $feeRate;
    
        // Save fee amount in company budget
        $companyBudget = new fms10_companybudget();
        $companyBudget->user_id = $user->id;
        $companyBudget->budget = $feeAmount; // Save the fee amount in the company budget
        $companyBudget->description = 'Investment Fee'; // Adjust the description as needed
        $companyBudget->save();
        
        // Create the investment request
        $investment = new fms10_investments();
        $investment->user_id = $user->id;
        $investment->firstname = $user->firstname;
        $investment->lastname = $user->lastname;
        $investment->amount = $request->amount; // Save investment amount without tax
        $investment->investment_date = $request->investment_date;
        $investment->type = 'Investment'; // Assuming type is passed in the request
        $investment->save();

        // Record the transaction history for the payout
        $transactionHistory = new fms10_transactionhistory();
        $transactionHistory->user_id = $user->id;
        $transactionHistory->firstname = $user->firstname;
        $transactionHistory->lastname = $user->lastname;
        $transactionHistory->amount = $request->amount;// Save the payout amount after fee deduction
        $transactionHistory->description = 'Investment'; // Adjust the description as needed
        $transactionHistory->type = 'Balance'; // Adjust the type as needed
        $transactionHistory->save();
        
        // Update the user's account balance (deduct total amount)
        $account->balance -= $totalAmount;
        $account->save();
        
        // Calculate revenue (for example, based on interest rate or investment performance)
        $revenue = $totalAmount * 0.08; // Assuming a fixed revenue rate of 8%
        
        // Create revenue record
        $earning = new fms10_earnings();
        $earning->user_id = $user->id;
        $earning->amount = $revenue;
        $earning->investment_id = $investment->id; // Associate revenue with the investment
        $earning->save();
        
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
        $account = fms10_accounts::where('user_id', $investmentRequest->user_id)->first();

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

        $account = DB::table('fms10_accounts')
            ->join('users', 'users.id', '=', 'fms10_accounts.user_id')
            ->where('fms10_accounts.user_id', $userId)
            ->value('fms10_accounts.balance');

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model
            
        $payouts = fms10_payouts::where('user_id', $userId)->get();


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
        $account = fms10_accounts::where('user_id', $user->id)->first();
    
        if (!$account) {
            return back()->with('error', 'No account found for the user.');
        }
    
        // Check if the user has sufficient balance for the payout
        if ($account->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance for the payout.');
        }
    
        // Define the fee rate (e.g., 1%)
        $feeRate = 0.01;
        // Calculate the fee amount
        $feeAmount = $request->amount * $feeRate;
        // Calculate the payout amount after deducting the fee
        $payoutAmount = $request->amount - $feeAmount;
    
        // Deduct the payout amount from the user's account balance
        $account->balance -= $payoutAmount;
        $account->save();
    
        // Record the transaction for the fee deduction
        $transactionTax = new fms10_companybudget();
        $transactionTax->user_id = $user->id;
        $transactionTax->budget = $feeAmount; // Save the fee amount in the transaction record
        $transactionTax->description = 'Payout Fee'; // Adjust the description as needed
        $transactionTax->save();
    
        // Record the transaction history for the payout
        $transactionHistory = new fms10_transactionhistory();
        $transactionHistory->user_id = $user->id;
        $transactionHistory->firstname = $user->firstname;
        $transactionHistory->lastname = $user->lastname;
        $transactionHistory->amount = $payoutAmount; // Save the payout amount after fee deduction
        $transactionHistory->description = 'Payouts'; // Adjust the description as needed
        $transactionHistory->type = 'Paypal'; // Adjust the type as needed
        $transactionHistory->save();
    
        // Record the payout
        $payout = new fms10_payouts();
        $payout->user_id = $user->id;
        $payout->withdrawal_account = mt_rand(1000000000, 9999999999); // Generate a 10-digit random number
        $payout->firstname = $user->firstname;
        $payout->lastname = $user->lastname;
        $payout->email = $user->email;
        $payout->amount = $payoutAmount; // Save the payout amount after fee deduction
        $payout->status = 'Completed';
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
            'birthdate' => 'required|date', // Adjust the validation rule for birthday as needed
        ]);
        
        // Update the authenticated user's profile if $user is defined
        if ($user) {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
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