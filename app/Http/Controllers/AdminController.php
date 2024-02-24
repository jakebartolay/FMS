<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;
use App\Models\Role;
use App\Models\User;
use App\Models\Account;
use DB;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $account1 = vendorInfo::count();
        $account2 = User::where('role', '=', 0)->count();

        $user = auth()->user();

        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Unknown';
        }

        $countBalance = DB::table('accounts')->sum(DB::raw('CAST(balance AS DECIMAL(10, 2))'));

        return view('admin.dashboard', compact('user','roleName','account1','account2','countBalance'));
    }

    public function Activity()
    {
        $user = auth()->user();
        return view('admin.sidebar.activity_logs', compact('user'));
    }

    public function vendorList()
    {
        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.vendorlist', compact('user', 'data'));
    }


    public function addVendor()
    {
        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.addvendor', compact('user','data'));             
    }
}
