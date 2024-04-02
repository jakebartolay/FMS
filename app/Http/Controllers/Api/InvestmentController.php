<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Investments;

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
