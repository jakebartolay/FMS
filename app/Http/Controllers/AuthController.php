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
    public function loadDashboardIndex()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('index');
    }
    
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
            'password' => 'string|required|confirmed|min:3'
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

    public function loadBackEnd()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('backendlogin');
    }

    public function backEnd(Request $request)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');

        $email = $request->email;

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [ 
            'name' => $email,
            'email' => $email,
            'description' => 'User logged in to account',
            'date_time' => $todayDate,
        ];

        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){
            DB::table('activity_logs')->insert($activityLog);
            $route = $this->redirectDash();
            return redirect($route);
        }
        else{
            return back()->with('error','Username & Password is incorrect');
        }
    }

    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');

        $email = $request->email;

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [ 
            'name' => $email,
            'email' => $email,
            'description' => 'Has Log In',
            'date_time' => $todayDate,
        ];

        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){
            DB::table('activity_logs')->insert($activityLog);
            $route = $this->redirectDash();
            return redirect($route);
        }
        else{
            return back()->with('error','Username & Password is incorrect');
        }
    }

    public function loadDashboard()
    {
        return view('user.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/super-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 2){
            $redirect = '/admin/dashboard';
        }
        // else if(Auth::user() && Auth::user()->role == 3){
        //     $redirect = '/manager/dashboard';
        // }
        else if(Auth::user() && Auth::user()->role == 4){
            $redirect = '/employee/dashboard';
        }
        else{
            $redirect = '/dashboard';
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
