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

    public function vendorselection()
    {
        $data = vendorInfo::all();
        $user = auth()->user();

        return view('admin.sidebar.vendorselection', compact(['user','data']));
        
    }

    public function NegatiationContract()
    {
        $user = auth()->user();
        return view('admin.sidebar.negatiationcontract', compact('user'));
    }

    public function VendorApproval()
    {
        $user = auth()->user();
        return view('admin.sidebar.vendorapproval', compact('user'));
    }


    public function PerformanceMonitoring()
    {
        $user = auth()->user();
        return view('admin.sidebar.performancemonitoring', compact('user'));
    }

    public function InvoicingPayment()
    {
        $user = auth()->user();
        return view('admin.sidebar.invoicingpayment', compact('user'));
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
