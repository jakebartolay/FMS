<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        return view('admin.dashboard', compact('user'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.user_profile', compact('user'));
    }

    public function vendormanagement()
    {
        $data = vendorInfo::all();
        $user = auth()->user();

        return view('admin.sidebar.vendormanagement', compact(['user','data']));
        
    }

    public function investment()
    {
        $user = auth()->user();
        return view('admin.sidebar.investmentmanagement', compact('user'));
    }

    public function payment()
    {
        $user = auth()->user();
        return view('admin.sidebar.payment', compact('user'));
    }


    public function document()
    {
        $user = auth()->user();
        return view('admin.sidebar.document', compact('user'));
    }

    public function report()
    {
        $user = auth()->user();
        return view('admin.sidebar.report', compact('user'));
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
