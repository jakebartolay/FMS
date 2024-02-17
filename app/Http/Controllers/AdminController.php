<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;
use App\Models\vendorUser;

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
        $data = vendorUser::all();
        $user = auth()->user();

        return view('admin.sidebar.vendorselection', compact(['user','data']));
        
    }

    public function NegatiationContract()
    {
        $dataCount = vendorInfo::count('*');
        $negotiable = vendorInfo::where('status', 'Negotiable')->count();
        $nonnegotiable = vendorInfo::where('status', 'Non-Negotiable')->count();

        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.negatiationcontract', compact('user', 'data', 'dataCount', 'negotiable', 'nonnegotiable'));
    }

    public function VendorApproval()
    {
        $dataCount = vendorInfo::count('*');
        $negotiable = vendorInfo::where('status', 'Negotiable')->count();
        $nonnegotiable = vendorInfo::where('status', 'Non-Negotiable')->count();

        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.vendorapproval', compact('user','data','dataCount', 'negotiable', 'nonnegotiable'));
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
