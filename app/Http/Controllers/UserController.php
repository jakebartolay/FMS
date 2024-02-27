<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\User;
use App\Models\Account;
use App\Models\Investment;
use App\Models\DepositRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //
    public function dashboard()
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

        $invest = Investment::where('user_id', '=', auth()->id())->count();

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id') // Join on the primary key of the users table
            ->where('accounts.user_id', $id)
            ->value('accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        $activityLog = DB::table('activity_logs')->get();
        return view('user.dashboard', compact('user', 'activityLog', 'roleName', 'formattedBalance','invest'));
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

        $account = DB::table('accounts')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $userId)
            ->value('accounts.balance');


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        $userId = auth()->id();

        // Retrieve the accounts associated with the specific user
        $accounts = Account::join('investment_statuses', 'investment_statuses.id', '=', 'accounts.status_id')
            ->join('users', 'users.id', '=', 'accounts.user_id')
            ->where('accounts.user_id', $userId) // Filter by user ID
            ->select('accounts.*', 'investment_statuses.name as status_name', 'users.firstname as user_name')
            ->get();
        

        return view('user.sidebar.wallet', compact('user', 'accounts', 'formattedBalance', 'roleName'));
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
    
            return back()->with('success', 'Deposit request submitted successfully. It will be processed after approval.');
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

        $id = $user->id; // Assuming the primary key of the users table is `id`
        $investments = DB::table('investments')
        ->join('investment_statuses', 'investment_statuses.id', '=', 'investments.status')
        ->where('investments.user_id', $id)
        ->select('investments.*', 'investment_statuses.name as status_name')
        ->get();

        return view('user.sidebar.investment', compact('investments', 'user', 'roleName'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'amount' => 'required|numeric|min:0|max:10000000',
                'investment_date' => 'required|date',
            ]);
        
            // Create the investment
            $investment = auth()->user()->investments()->create($request->all());
        
            // Redirect to the investment route with success message
            return redirect()->route('investment')->with('success', 'Investment created successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating investment: ' . $e->getMessage());
        
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to create investment. Please try again.');
        }
        
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


        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places
        return view('user.sidebar.withdrawal', compact('user', 'roleName', 'formattedBalance'));
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