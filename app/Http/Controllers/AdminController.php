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

    public function NegatiationContract()
    {
        $dataCount = vendorInfo::count('*');
        $revenue = vendorInfo::sum('spend');
        $approve = vendorInfo::where('status', 'Approve')->count();
        $decline = vendorInfo::where('status', 'Decline')->count();
        $waiting = vendorInfo::where('status', 'Waiting')->count();

        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.negatiationcontract', compact('user', 'data', 'dataCount', 'revenue', 'approve', 'decline','waiting'));
    }


    public function PerformanceMonitoring()
    {
        $dataCount = vendorInfo::count();
        $approve = vendorInfo::where('status', 'Approve')->count();
        $decline = vendorInfo::where('status', 'Decline')->count();
        $waiting = vendorInfo::where('status', 'Waiting')->count();
        $approveCount = vendorInfo::where('status', 'Approve')->count();
        $declineCount = vendorInfo::where('status', 'Decline')->count();
        $waitingCount = vendorInfo::where('status', 'Waiting')->count();
        
        $reports = vendorInfo::selectRaw('YEAR(starting_date) as year, MONTH(starting_date) as month, 
        COUNT(DISTINCT CASE WHEN status = "Approve" THEN vendor_id END) as total_approve,
        COUNT(DISTINCT CASE WHEN status = "Decline" THEN vendor_id END) as total_decline,
        COUNT(DISTINCT CASE WHEN status = "Waiting" THEN vendor_id END) as total_waiting,
        COUNT(DISTINCT vendor_id) as customer_count')
            ->groupBy('year', 'month')
            ->get();
        
        $user = auth()->user();
        $data = vendorInfo::all();
        
        return view('admin.sidebar.performancemonitoring', compact('user', 'reports', 'data', 'dataCount', 'approve', 'decline', 'waiting', 'approveCount', 'declineCount', 'waitingCount'));             
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
