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
use DB;

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
        $userId = $user->id; // Assuming the user_id is stored in the `user_id` attribute of the user model
        
        $account = DB::table('accounts')
        ->join('users', 'users.id', '=', 'accounts.user_id')
        ->where('accounts.user_id', $userId)
        ->value('accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places
    
        $activityLog = DB::table('activity_logs')->get();
        return view('user.dashboard', compact('user','activityLog','roleName','formattedBalance'));
    }

    public function Error(){
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
        return view('user.sidebar.profile', compact('user','roleName'));
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
        return view('user.sidebar.profile', compact('user','roleName'));
    }

    public function Transaction(){

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
        return view('user.sidebar.transaction', compact('user','roleName', 'formattedBalance'));
    }

    public function Wallet(){

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

        return view('user.sidebar.wallet', compact('user','formattedBalance','roleName'));
    }

    public function Deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        
        $user = auth()->user();
        $amount = $request->amount;
        
        try {
            // Retrieve the user's account record
            $account = $user->account;
        
            if ($account) {
                // If account exists, update balance
                $account->balance += $amount;
            } else {
                // If account doesn't exist, create a new one
                $account = new Account();
                $account->user_id = $user->id; // Use $user->id instead of $user->user_id
                $account->balance = $amount;
            }
        
            $account->save();
        
            // Log the transaction or generate a receipt if needed
        
            return back()->with('success', 'Amount deposited successfully.');
        } catch (\Exception $e) {
            // Handle the exception (e.g., log error, display error message)
            return back()->with('error', 'An error occurred while processing the deposit.');
        }
    }

    public function paywithPaypal(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }

        $user = auth()->user(); // Assuming you're fetching the authenticated user
        $userId = $user->user_id; // Assuming the user_id is stored in the `user_id` attribute of the user model
        
        $account = DB::table('accounts')
        ->join('users', 'users.user_id', '=', 'accounts.user_id')
        ->where('accounts.user_id', $userId)
        ->value('accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        return view('user.deposit.paypal', compact('user','formattedBalance','roleName'));
    }

    public function Investment(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }
        $investments = Investment::where('user_id', auth()->id())->get();

        $user = auth()->user();
        return view('user.sidebar.investment', compact('user','roleName','investments'));
    }

    public function Withdrawals(){
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
        return view('user.sidebar.withdrawal', compact('user','roleName','formattedBalance'));
    }

    public function ContactSupport(){
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Client';
        }
        $user = auth()->user();
        return view('user.sidebar.contactsupport', compact('user','roleName'));
    }



    public function updateProfile(Request $request)
    {
         // return dd($request->all());
        $user = auth()->user();

        // Validate the request
        $request->validate([
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
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
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'password' =>'required|string|min:15',
            'role' =>'required'
        ]);

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return back()->with('success','Created Account has been successfull.');
    }

}