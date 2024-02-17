<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;
use App\Models\vendorUser;
use DB;


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
        $approve = vendorInfo::where('status', 'Approve')->count();
        $decline = vendorInfo::where('status', 'Decline')->count();
        $waiting = vendorInfo::where('status', 'Waiting')->count();

        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.vendorapproval', compact('user','data','dataCount', 'approve', 'decline','waiting'));
    }


    public function PerformanceMonitoring()
    {
        $dataCount = vendorInfo::count('*');
        $revenue = vendorInfo::sum('spend');
        $totalSpend = vendorInfo::sum('spend');
        $userSpend = vendorInfo::select('vendor_id', DB::raw('SUM(spend) as total_spend'))
            ->groupBy('vendor_id')
            ->get();
        $userSpendArray = $userSpend->pluck('total_spend', 'vendor_id')->toArray();

        
        $reports = vendorInfo::selectRaw('YEAR(starting_date) as year, MONTH(starting_date) as month, COUNT(*) as customer_count, SUM(spend) as total_spend')
            ->groupBy('year', 'month')
            ->get();

        $totalSpendData = [['year_month' => 'Total Spend', 'spend' => $totalSpend]];
        
        $user = auth()->user();
        
        return view('admin.sidebar.performancemonitoring', compact('user', 'reports', 'dataCount', 'revenue', 'totalSpendData', 'userSpendArray'));       
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
