<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendorInfo;
use App\Models\Role;
use App\Models\User;


class ManagerController extends Controller
{
    //
    public function dashboard()
    {
        $account1 = vendorInfo::count();
        $account2 = User::where('role', '=', 0)->count();

        $user = auth()->user();

        $userRole = Role::find($user->role);

        if ($userRole) {
            $roleName = $userRole->name;
        } else {
            // Handle the case where the role is not found
            $roleName = 'Unknown';
        }

        return view('manager.dashboard', compact('user','roleName','account1','account2'));
    }
}
