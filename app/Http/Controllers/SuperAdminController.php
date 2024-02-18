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
        $user = auth()->user();
        return view('super-admin.dashboard', compact('user'));
    }

    public function users()
    {
        
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        
        $user = auth()->user();
        return view('super-admin.user_profile', compact('users','roles', 'user'));
    }

    // public function manageRole()
    // {
    //     $user = auth()->user();
    //     $users = User::where('role','!=',1)->get();
    //     $roles = Role::all();
    //     return view('super-admin.manage-role', compact(['users','roles','user']));
    // }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back()->with('success','Role has been change successfull.');
    }

    public function vendormanagement()
    {
        $data = vendorInfo::all();
        $user = auth()->user();

        return view('super-admin.sidebar.vendormanagement', compact(['user','data']));
        
    }

    public function investment()
    {
        $user = auth()->user();
        return view('super-admin.sidebar.investmentmanagement', compact('user'));
    }

    public function payment()
    {
        $user = auth()->user();
        return view('super-admin.sidebar.payment', compact('user'));
    }


    public function document()
    {
        $user = auth()->user();
        return view('super-admin.sidebar.document', compact('user'));
    }

    public function report()
    {
        $user = auth()->user();
        return view('super-admin.sidebar.report', compact('user'));
    }
}
