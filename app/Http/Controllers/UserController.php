<?php

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Payouts;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        $investments = InvestmentRequest::where('user_id', auth()->id())
            ->orderBy('created_at')
            ->pluck('amount')
            ->toArray();
            

        // Pass the investment data to the chart configuration
        $chartData = json_encode($investments);

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $id = $user->id; // Assuming the primary key of the users table is `id`

        $invest = InvestmentRequest::where('user_id', auth()->id())
        ->whereNotIn('status', [3, 10])
        ->count();
    

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id') // Join on the primary key of the users table
            ->where('accounts.user_id', $id)
            ->value('accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        $activityLog = DB::table('activity_logs')->get();

        $payouts = Payouts::count();
        $payoutcount = Payouts::sum('amount');

        ////PAYOUTS

        $payoutAmounts = Payouts::where('user_id', auth()->id())
        ->orderBy('created_at')
        ->pluck('amount')
        ->toArray();
    
        // Pass the investment data to the chart configuration
        $payout = json_encode($payoutAmounts);
    


        return view('user.dashboard', compact('user', 'activityLog', 'roleName','payout', 
        'formattedBalance', 'invest', 'chartData','payouts','payoutcount'));
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
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        $user = auth()->user();
        return view('user.sidebar.profile', compact('user', 'roleName'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }
        $user = auth()->user();
        return view('user.sidebar.profile', compact('user', 'roleName'));
    }

    public function Transaction()
    {

        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $userId)
            ->value('accounts.balance');


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        $user = auth()->user();
        return view('user.sidebar.transaction', compact('user', 'roleName', 'formattedBalance'));
    }

    public function transferForm(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }
        return view('user.deposit.transfer', compact('user','roleName'));
    }

    public function transfer(Request $request)
    {
        // Validation
        $request->validate([
            'id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve sender's account
        $senderAccount = auth()->user()->accounts()->first(); // Assuming there's a relationship named 'account'

        // Check if sender's account exists
        if (!$senderAccount) {
            return back()->with('error', 'Sender account not found.');
        }

        // Check if sender has sufficient balance
        if ($senderAccount->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance to transfer.');
        }


        // Retrieve recipient's account
        $recipientAccount = Account::findOrFail($request->id); // Assuming 'id' corresponds to the recipient's account ID

        // Perform balance transfer
        $senderAccount->balance -= $request->amount;
        $recipientAccount->balance += $request->amount;

        // Save changes
        $senderAccount->save();
        $recipientAccount->save();

        // Return response
        return redirect()->route('transaction')->with('success', 'Transfer updated successfully');
    }
    

    public function Wallet()
    {

        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model

        $invest = InvestmentRequest::where('user_id', auth()->id())
        ->where('status', '<>', 10)
        ->count();

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $userId)
            ->value('accounts.balance');


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        $userId = auth()->id();

        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Assuming the primary key of the users table is `id`, you can retrieve the user's ID
        $id = $user->id;

        // Join the `accounts` table with the `users` table using the `user_id` foreign key
        $depositrequest = depositrequest::join('investment_statuses', 'investment_statuses.id', '=', 'depositrequest.status')
            ->join('users', 'users.id', '=', 'depositrequest.user_id')
            ->where('users.id', $id) // Filter the deposit requests by the user's ID
            ->select('depositrequest.*', 'investment_statuses.name as status_name', 'users.firstname as firstname', 'users.lastname as lastname')
            ->get();

        

        return view('user.sidebar.wallet', compact('user', 'depositrequest', 'formattedBalance', 'roleName','invest'));
    }

    public function showContact()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }
        return view('user.sidebar.contactsupport', compact('user','roleName'));
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

    public function Deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0|max:1000000',
        ]);
    
        $user = auth()->user();
        $amount = $request->amount;

            // Create a new deposit request
            $depositRequest = new depositrequest();
            $depositRequest->user_id = $user->id;
            $depositRequest->amount = $amount;
            $depositRequest->status = '3'; // Initial status is pending
            $depositRequest->save();
    
            // Log the deposit request or notify admin for approval
    
            return back()->route('wallet')->with('success', 'Deposit request submitted successfully. It will be processed after approval.');
    }

    public function paywithPaypal()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
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

    public function Investment()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        $user = auth()->user();

        $invest = investmentrequest::join('investment_statuses', 'investment_statuses.id', '=', 'investmentrequest.status')
            ->join('users', 'users.id', '=', 'investmentrequest.user_id')
            ->where('investmentrequest.user_id', $user->id)
            ->select('investmentrequest.*', 'investment_statuses.name as status_name', 'users.firstname as firstname', 'users.lastname as lastname')
            ->get();        

        return view('user.sidebar.investment', compact('invest', 'user', 'roleName'));
    }
    public function invest()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        } 

        return view('user.deposit.investments', compact('user', 'roleName'));
    }

    public function InvestmentRequest(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0|max:1000000',
            'investment_date' => 'required|date'
        ]);
        
        // Retrieve the authenticated user
        $user = auth()->user();
        
        // Check if the user has sufficient balance
        $account = Account::where('user_id', $user->id)->first();
        if (!$account || $account->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance. Please deposit funds first.');
        }
        
        // Create a new Investment request
        $investRequest = new investmentrequest();
        $investRequest->user_id = $user->id;
        $investRequest->amount = $request->amount;
        $investRequest->status = '3'; // Initial status is pending
        
        // Save the Investment request
        $investRequest->save();
        
        // Update the user's account balance
        $account->balance -= $request->amount;
        $account->save();
        
        // Redirect back with a success message
        return back()->with('success', 'Investment request submitted successfully. It will be processed after approval.');        

        // Validate the form data
        // try {
        //     $user = auth()->user();

        //     // Validate the request data
        //     $request->validate([
        //         'amount' => 'required|numeric|min:0|max:10000000',
        //         'investment_date' => 'required|date',
        //     ]);
            
        //     // Create a new deposit request
        //     $investmentRequest = new investmentrequest();
        //     $investmentRequest->user_id = $user->id;
        //     $investmentRequest->amount = $request->amount; // Assign the amount from the request
        //     $investmentRequest->status = '3'; // Initial status is pending
        //     $investmentRequest->save();
            
        //     // Redirect to the investment route with success message
        //     return redirect()->route('invest')->with('success', 'Investment created successfully.');
        // } catch (\Exception $e) {
        //     // Log the error
        //     \Log::error('Error creating investment: ' . $e->getMessage());

        //     // Redirect back with error message
        //     return redirect()->back()->with('error', 'Failed to create investment. Please try again.');
        // }

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
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $userId)
            ->value('accounts.balance');

        $payouts = Payouts::all();


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places
        return view('user.sidebar.withdrawal', compact('user', 'roleName', 'formattedBalance','payouts'));
    }

    public function payoutGateways(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        return view('user.deposit.payoutgate', compact('user', 'roleName'));
    }
    
    public function paypal(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
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

        // Assuming `status_id` in the `payouts` table corresponds to the user's role
        $payout->status_id = $user->role;
        // dd($payout);
        $payout->save();
        return redirect()->route('withdrawals')->with('success', 'Payout successful.');
    }
    
    public function ContactSupport()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }
        $user = auth()->user();
        return view('user.sidebar.contactsupport', compact('user', 'roleName'));
    }

    public function updateProfile(Request $request)
    {
        // return dd($request->all());
        $user = auth()->user();

        // Validate the request
        $request->validate([
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user->id,
            // Other validation rules for password and role if necessary
        ]);

        // Update the authenticated user's profile
        $user = auth()->user();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Information has been updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:6|max:100',
            'new_password' => 'required|min:6|max:100',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $current_user = auth()->user();

        if (Hash::check($request->current_password, $current_user->password)) {
            $current_user->update([
                'password' => bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Password successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
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
}