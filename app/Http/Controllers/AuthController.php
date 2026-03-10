<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function renderRegistration (){
        return view('Auth/registration');

    }

    public function renderLogin(){
        return view('Auth/login');
    }
    
    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function registerCustomer(Request $request){
        
      $validated=$request->validate([
        'cust_fullName'=>'required',
        "cust_email"=>'required|email|unique:customers,cust_email',
        "cust_password"=>['required', 
                           Password::min(8)
                           ->mixedCase()
                           ->symbols()                          
                         ]
      ]);

      $id="cust_".random_int(100000,999999);
      $validated['cust_id']=$id;
      

      
      try {
            // 1. Attempt to create the customer
            $customer = Customer::create($validated);

            // 2. If successful, send success response
             return response()->json([
                'status' => 'success',
                'message' => 'Customer created successfully!',
                'data' => $customer
            ], 201);

        } catch (\Exception $e) {
            // Return an error response
            return response()->json([
                'status' => 'error',
                'message' => 'Database Error: ' . $e->getMessage()
            ], 500);

        }


        // return view('Auth/login');
    }

    public function renderEmailVerification(){
        return view('Auth/emailVerification');
    }
}

