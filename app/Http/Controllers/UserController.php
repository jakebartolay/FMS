<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\User;
use App\Models\Account;
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
        $userId = $user->user_id; // Assuming the user_id is stored in the `user_id` attribute of the user model
        
        $account = DB::table('accounts')
        ->join('users', 'users.user_id', '=', 'accounts.user_id')
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
        $userId = $user->user_id; // Assuming the user_id is stored in the `user_id` attribute of the user model
        
        $account = DB::table('accounts')
        ->join('users', 'users.user_id', '=', 'accounts.user_id')
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
        $userId = $user->user_id; // Assuming the user_id is stored in the `user_id` attribute of the user model
        
        $account = DB::table('accounts')
        ->join('users', 'users.user_id', '=', 'accounts.user_id')
        ->where('accounts.user_id', $userId)
        ->value('accounts.balance');

        $formattedBalance = number_format($account, 2); // Assuming you want two decimal places

        return view('user.sidebar.wallet', compact('user','formattedBalance','roleName'));
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

        $user = auth()->user();
        return view('user.sidebar.investment', compact('user','roleName'));
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
        $user = auth()->user();
        return view('user.sidebar.withdrawal', compact('user','roleName'));
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

        return redirect()->back()->with('success', 'Information has been updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:3|max:100',
            'newpassword' => 'required|min:6|max:100',
            'renewpassword' => 'required|same:newPassword',
            // Other validation rules for password and role if necessary
        ]);
       
        $user = auth()->user();

        if(hash::check($request->password,$user->password)){
            $user->update([

                'password'=>bcrypt($request->newPassword)
            ]);
            return redirect()->back()->with('success', 'Password successfully updated.');

        }else{
            return redirect()->back()->with('error', 'Old password does not matched.');
        }
    }


    public function createUsers(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'password' =>'required|string|min:3',
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
