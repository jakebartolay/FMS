<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;
use App\Models\Role;
use App\Models\User;
use App\Models\Account;
use App\Models\Investment;
use App\Models\DepositRequest;
use DB;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $account1 = vendorInfo::count();
        $account2 = User::where('role', '=', 0)->count();
        $account3 = vendorInfo::where('vendor_id', '=', 'Approve')->count();

        $user = auth()->user();

        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Unknown';
        }

        $investment = DB::table('investments')->sum(DB::raw('CAST(amount AS DECIMAL(10, 2))'));

        $countBalance = DB::table('accounts')->sum(DB::raw('CAST(balance AS DECIMAL(10, 2))'));

        return view('admin.dashboard', compact('user', 'roleName', 'account1', 'account2', 'countBalance','investment','account3'));
    }
    
    public function Deposit()
    {
        $user = auth()->user();

        $id = $user->id; // Assuming the primary key of the users table is `id`
                
        // Join the `accounts` table with the `users` table using the `user_id` foreign key
        $depositrequest = depositrequest::join('investment_statuses', 'investment_statuses.id', '=', 'depositrequest.status')
        ->join('users', 'users.id', '=', 'depositrequest.user_id')
        ->select('depositrequest.*', 'investment_statuses.name as status_name', 'users.firstname as user_name')
        ->get();

                
        return view('admin.investments.deposit', compact('user', 'depositrequest'));
        
    }

    public function destroy(Request $request, $id)
    {
        try {
            // Find the record by ID
            $record = depositrequest::findOrFail($id);
            
            // Delete the record
            $record->delete();
            
            // Redirect with success message
            return redirect()->back()->with('success', 'Record deleted successfully.');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., record not found, database error)
            return redirect()->back()->with('error', 'Failed to delete record.');
        }
    }
    

    public function approve(Request $request, $id)
    {
        try {
            // Find the deposit request by ID
            $depositRequest = DepositRequest::findOrFail($id);
            
            // Update the status to "approved"
            $depositRequest->status = '1';
            $depositRequest->save();
            
            // Retrieve the user's account associated with the deposit request
            $userAccount = Account::where('user_id', $depositRequest->user_id)->firstOrFail();
            
            // Update the user's account balance
            $userAccount->balance += $depositRequest->amount;
            $userAccount->save();
            
            return redirect()->route('investments.deposit')
                ->with('success', 'Deposit request approved successfully.');
        } catch (\Exception $e) {
            // Handle errors (e.g., deposit request not found)
            return redirect()->back()
                ->with('error', 'Failed to approve deposit request.');
        }
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

    public function index()
    {
        $user = auth()->user();

        $id = $user->id; // Assuming the primary key of the users table is `id`

        $invest = Investment::join('investment_statuses', 'investment_statuses.id', '=', 'investments.status')
        ->join('users', 'users.id', '=', 'investments.user_id')
        ->select('investments.*', 'investment_statuses.name as status_name', 'users.firstname as user_name')
        ->get();

        return view('admin.investments.index', compact('user','invest'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('admin.investments.create', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'amount' => 'required|numeric|min:0|max:10000000',
                'investment_date' => 'required|date',
            ]);
        
            // Create the investment
            $investment = auth()->user()->investments()->create($request->all());
        
            // Redirect to the investment route with success message
            return redirect()->route('investments.index')->with('success', 'Investment created successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating investment: ' . $e->getMessage());
        
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to create investment. Please try again.');
        }
    }

    public function addVendor()
    {
        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.addvendor', compact('user', 'data'));
    }
}
