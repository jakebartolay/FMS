<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        $activityLog = DB::table('activity_logs')->get();
        return view('user.dashboard', compact('user','activityLog'));
    }
    // Activity Log
    public function activityLoginLogout()
    {
            $activityLog = DB::table('activity_logs')->get();
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
}
