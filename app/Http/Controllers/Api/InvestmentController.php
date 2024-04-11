<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Investments;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Account;

class InvestmentController extends Controller
{
    public function index(){
        $investor = Investments::all();
        if($investor->count() > 0){
            
            return response()->json([
                'status' => 200,
                'investor' => $investor
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function users(){
        // Retrieve all users from the database
        $users = User::all();
    
        // Remove users with IDs 1 or 2
        $filteredUsers = $users->reject(function ($user) {
            return $user->id == 1 || $user->id == 2;
        });
    
        if($filteredUsers->count() > 0){
            // Return a JSON response with the remaining users
            return response()->json([
                'status' => 200,
                'users' => $filteredUsers
            ], 200);
        } else {
            // Return a JSON response with a 404 error if no users are found
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    
    public function accounts(){
        $transaction = Transaction::all();
        if($transaction->count() > 0){
            
            return response()->json([
                'status' => 200,
                'users' => $transaction
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function money(){
        $transaction = Transaction::all();
        if($transaction->count() > 0){
            
            return response()->json([
                'status' => 200,
                'users' => $transaction
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'role_name' => 'required|max:255',
        ]);
    
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            // Provide a default password if not provided in the request
            $password = $request->input('password', 'default_password');
            
            $vendor = Vendorsuser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'role' => $request->role_name, // Assuming the column name is role_name
            ]);
    
            if($vendor){
                return response()->json([
                    'status' => 200,
                    'message' => "Vendor User Created Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Failed to create user"
                ], 500);
            }
        }
    }
}
