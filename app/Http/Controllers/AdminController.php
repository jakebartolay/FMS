<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;
use App\Models\Role;


class AdminController extends Controller
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

        return view('admin.dashboard', compact('user','roleName'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.user_profile', compact('user'));
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

    public function vendorUpdate()
    {
        $user = auth()->user();
        return view('admin.sidebar.vendorupdate', compact('user'));
    }

    public function contact()
    {
        $user = auth()->user();
        return view('admin.sidebar.contact_page', compact('user'));
    }

    public function faq()
    {
        $user = auth()->user();
        return view('admin.sidebar.faq', compact('user'));
    }
}
