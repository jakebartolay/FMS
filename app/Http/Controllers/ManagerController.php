<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class ManagerController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Unknown';
        }
        
        return view('manager.dashboard', compact('user','roleName'));
    }
}
