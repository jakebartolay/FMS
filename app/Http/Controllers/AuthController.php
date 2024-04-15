<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\fms10_accounts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Socialite;
use Exception;
use DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        
            $findUser = User::where('google_id', $user->id)->first();
        
            if ($findUser) {
                Auth::login($findUser);
            } else {
                // Generate a unique ID for the user
                $id = uniqid();
                $trimmedId = substr($id, -8);

                // Create the new user
                $newUser = User::create([
                    'id' => $trimmedId,
                    'firstname' => $user->user['given_name'],
                    'lastname' => $user->user['family_name'],
                    'phone' => $user->phone_number,
                    'address' => $user->address,
                    'google_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make('12345dummy'),
                    'profile_path_picture' => 'https://ui-avatars.com/api/?name=' . urlencode($user->user['given_name'] . ' ' . $user->user['family_name']),
                    'role' => 100,
                ]);

                // Update the user_id of the new user with its own ID
                $newUser->user_id = $newUser->id;
                $newUser->save();

                // Generate a random UUID for the account ID
                $accountId = Str::uuid();

                // Create an account for the new user
                $account = new fms10_accounts();
                $account->id = $accountId; // Set the generated UUID as the account's ID
                $account->user_id = $newUser->id; // Set the user's ID as the account's user_id
                $account->firstname = $newUser->firstname; // Set the user's firstname
                $account->lastname = $newUser->lastname; // Set the user's lastname
                $account->balance = 0; // Assuming starting balance is zero
                $account->status = 'Active'; // Set the status directly
                $account->save();



                // Log in the new user
                Auth::login($newUser);

                // Get the ID of the newly created account
                $accountId = $account->id;
            }
    
            return redirect()->intended('/dashboard');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
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
            'password' => 'string|required|confirmed|min:10' // Minimum length set to 10 characters
        ]);

        // Create a new user instance
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->name = $request->lastname . ' ' . $request->firstname; // Concatenate first name and last name
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = '100';
        $user->profile_path_picture = 'https://ui-avatars.com/api/?name=' . urlencode($user->firstname . ' ' . $user->lastname); // Set profile picture URL
        $user->save();

        // Set the user_id attribute to the user's ID
        $user->user_id = $user->id;

        // Save the user again to update the user_id attribute
        $user->save();


        // Retrieve the ID of the newly created user
        $userId = $user->id;

        $accountId = Str::uuid();

        // Create a corresponding account for the user
        $account = new fms10_accounts();
        $account->id = $accountId; // Set the generated UUID as the account's ID
        $account->user_id = $userId; // Set the user's ID as the account's user_id
        $account->firstname = $request->firstname; // Set the user's firstname
        $account->lastname = $request->lastname; // Set the user's lastname
        $account->balance = 0; // Assuming starting balance is zero
        $account->status = 'Active'; // Assuming default status ID
        $account->save();


    
        // Redirect back with success message
        return back()->with('success', 'User and account created successfully.');
    }

    public function landingPage()
    {
        if (Auth::check()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        
        // Load the backend login view
        return view('index');
    }

    public function loadBackEnd()
    {
        // If a user is already authenticated, redirect them to the appropriate dashboard
        if (Auth::check()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        
        // Load the backend login view
        return view('backendlogin');
    }
    
    public function backEnd(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);
    
        $userCredential = $request->only('email', 'password');
    
        // Attempt to authenticate the user
        if (Auth::attempt($userCredential)) {
            // Check if the authenticated user has a role other than admin or superadmin
            $user = Auth::user();
            if ($user->role == 1 || $user->role == 2) {
                // If the user is admin or superadmin, redirect them to the appropriate dashboard
                $route = $this->redirectDash();
                return redirect($route);
            } else {
                // If the user is neither admin nor superadmin, log them out and redirect to regular login
                Auth::logout();
                return redirect('/backendlogin')->with('error', 'Regular users cannot login here.');
            }
        } else {
            // If authentication fails, redirect back with an error message
            return back()->with('error', 'Username & Password is incorrect');
        }
    }

    public function loadForgotPassword()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('forgot-password');
    }

    public function forgotpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $status = Password::sendResetLink($request->only('email'));
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withErrors(['email' => __($status)])->with('error','Email not exist to our system');
    }

    public function showResetForm(Request $request, $token)
    {
        return view('passwords-reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }


    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        $rememberMe = old('remember') ? 'checked' : ''; // Assuming 'remember' is the name of the checkbox
        return view('login', compact('rememberMe'));
        
    }

    public function login(Request $request)
    {

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
        
        // Attempt to authenticate the user
        if (Auth::attempt($userCredential)) {
            // Check if the authenticated user has a role other than admin or superadmin
            $user = Auth::user();
            if ($user->role != 0 && $user->role != 1 && $user->role != 2 && $user->role != 2 && $user->role != 3 && $user->role != 4 && $user->role != 5
            && $user->role != 6 && $user->role != 7 && $user->role != 8 && $user->role != 9 && $user->role != 10) {
                // Redirect the user to the appropriate dashboard
                DB::table('fms10_activity_logs')->insert($activityLog);
                $route = $this->redirectDash();
                return redirect($route);
            } else {
                // If the user is admin or superadmin, log them out
                Auth::logout();
                return back()->with('error','Admins and SuperAdmin cannot login here.');
            }            
        } else {
            // If authentication fails, redirect back with an error message
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
    
            DB::table('fms10_activity_logs')->insert($activityLog);
    
            // Clear the session and logout
            $request->session()->flush();
            Auth::logout();
    
            return redirect('/login');
        }
    
        return redirect('/login'); // If the user is not logged in, redirect to login page
    }

}
