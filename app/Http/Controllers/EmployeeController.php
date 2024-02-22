<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;
use App\Models\Role;
use App\Models\User;


class EmployeeController extends Controller
{
    //
    public function dashboard()
    {

        $user = auth()->user();

        return view('employee.dashboard', compact('user'));
    }
}
