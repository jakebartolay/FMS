<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\User;
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
            $roleName = 'Unknown';
        }

        $activityLog = DB::table('activity_logs')->get();
        return view('user.dashboard', compact('user','activityLog','roleName'));
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
        return view('user.sidebar.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('user.sidebar.profile', compact('user'));
    }

    public function Transaction(){
        $user = auth()->user();
        return view('user.sidebar.transaction', compact('user'));
    }

    public function Wallet(){
        $user = auth()->user();
        return view('user.sidebar.wallet', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Update the user's profile
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname, // corrected the syntax error
            'email' => $request->email // corrected the syntax error
        ]);
        // return dd($request->all());

        return redirect()->back()->with('success','Information Update has been changed successfully.');
    }

    public function createUsers(Request $request)
    {
        $request->validate([
            'firstname' => 'string|required|min:2',
            'lastname' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' =>'string|required|min:3',
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
