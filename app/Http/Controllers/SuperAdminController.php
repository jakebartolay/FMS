<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\vendorInfo;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        
        
        $user = auth()->user();
        return view('super-admin.dashboard', compact('users','roles', 'user'));
    }

    public function users()
    {

        $users = User::with('roles')->where('role','!=',1)->get();

        $user = auth()->user();
        return view('super-admin.users', compact('users','user'));
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
}
