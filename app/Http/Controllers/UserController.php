<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        $activityLog = DB::table('activity_logs')->get();
        return view('user.dashboard', compact('user','activityLog'));
    }
        // Activity Log
        public function activityLoginLogout()
        {
            $activityLog = DB::table('activity_logs')->get();
            return view('dashboard', compact('activityLog'));
        }
}
