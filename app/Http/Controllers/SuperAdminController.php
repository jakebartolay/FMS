<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;
use App\Models\vendorInfo;
use DB;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        $users = User::where('role', '!=', 1)->get();
        $roles = Role::all();
        
        $user = auth()->user();
        
        $activityLog = DB::table('activity_logs')->get();
        
        return view('super-admin.dashboard', compact('users', 'roles', 'user', 'activityLog'));
    }

    public function users(Request $request)
    {
        $users = User::with('roles')->where('role','!=',1)->get();
        $roles = Role::all();
    
        // Return the view with the success message
        $user = auth()->user();
        return view('super-admin.users', compact('users','roles','user'));
    }

    public function manageRole()
    {
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();

        $user = auth()->user();
        return view('super-admin.manage-role', compact(['users','roles','user']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back()->with('success','Role has been changed successfully.');
    }

    public function updateProfile(Request $request)
    {
        // Delegate the updateProfile request to UserController
        return (new UserController())->updateProfile($request);
    }

}
