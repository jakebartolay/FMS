<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        return view('user.dashboard', compact('user'));
    }
}
