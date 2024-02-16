<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagerController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        
        return view('manager.dashboard', compact('user'));
    }
}
