<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function loadRegister()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate the request data for user creation
        $request->validate([
            'firstname' => 'string|required|min:2',
            'lastname' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:10' // Minimum length set to 10 characters
        ]);

        // Create a new user instance
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect back with success message
        return back()->with('success', 'User and account created successfully.');
    }
    
    
    public function loadDashboard()
    {
        return view('user.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        if(Auth::check()) { // Check if the user is authenticated
            if(Auth::user()->role == 1) { // Check if the user's role is super-admin
                $redirect = '/super-admin/dashboard'; // Redirect to the super-admin dashboard
            } elseif(Auth::user()->role == 2) { // Check if the user's role is admin
                $redirect = '/admin/dashboard'; // Redirect to the admin dashboard
            } 
            // You can add more conditions for other roles here if needed
            // elseif(Auth::user()->role == 3) { 
            //     $redirect = '/manager/dashboard'; 
            // }
            // elseif(Auth::user()->role == 4) { 
            //     $redirect = '/employee/dashboard'; 
            // }
            else {
                $redirect = '/dashboard'; // Default dashboard route for users with other roles
            }
        } else {
            $redirect = '/login'; // If the user is not authenticated, redirect to the login page
        }
        
        return $redirect;
    }

    public function logout(Request $request)
    {
        if(Auth::check()) {
            $user = Auth::user();
    
            // Log the logout activity
            $email = $user->email;
            $dt = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
    
            $activityLog = [
                'name' => $email,
                'email' => $email,
                'description' => 'User logout',
                'date_time' => $todayDate,
            ];
    
            DB::table('activity_logs')->insert($activityLog);
    
            // Clear the session and logout
            $request->session()->flush();
            Auth::logout();
    
            return redirect('/login');
        }
    
        return redirect('/login'); // If the user is not logged in, redirect to login page
    }

}
