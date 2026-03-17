<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\token;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function token_generation($cust_id){
        $token=[
                "token_id"=>"",
                "token"=>"",
                "token_used"=>"",
                "token_expiresat"=>"",
                "cust_id"=>"",
            ];

       $token['token_id']="token_".random_int(100000,999999);
       $token['token']=random_int(100000,999999);     
       $token['token_used']="no";
       $token['token_expiresat']=now()->addMinutes(30);
       $token['cust_id']=$cust_id;
       
       return $token;
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

      $validated['cust_password']=Hash::make($request->cust_password) ;
      $id="cust_".random_int(100000,999999);
      $validated['cust_id']=$id;
      $validated['cust_emailverified']='no';
      // token generation

      $token=$this->token_generation($validated['cust_id']);

      try {
            // 1. Attempt to create the customer and the token
            $customer = Customer::create($validated);
            token::create($token);   
            $data=['fullName'=>$customer->cust_fullName,
                    'token'=>$token["token"],
                    ] ;
            // Mail::to($customer['cust_email'])->send(new WelcomeMail());
            
            Mail::send('emails.welcomeMail', $data, function($message) use ($customer) {
            $message->to($customer->cust_email, $customer->cust_fullName)
            ->subject('Welcome to Social Reader - Your Next Chapter Awaits');});

            // 2. If successful, send success response
             return response()->json([
                'status' => 'success',
                'message' => 'Customer created successfully!',
                'data' => $validated
            ], 201);

           
        } catch (\Exception $e) {
            // Return an error response
            return response()->json([
                'status' => 'error',
                'message' => 'Database Error: ' . $e->getMessage()
            ], 500);

        }
      
    }

    public function renderEmailVerification(){
        return view('Auth/emailVerification');
    }

    public function emailVerificationHandler(Request $request){
        $datas=$request->all();
        $cust_id=$datas['cust_id'];
        $token=$datas['token'];
        $token_db="";
        $token_expiration="";
        $token_used="";
        $cust_token=token::where('cust_id',$cust_id)->first();

        if($cust_token){
            $token_db=$cust_token->token;
            $token_expiration=$cust_token->token_expiresat;
            $token_used=$cust_token->token_used;
        }
        $actualTime=now();

        if($token_db== $token && $actualTime<$token_expiration&&  $token_used=="no"){
            // update validation status in db
            $customer=Customer::where('cust_id',$cust_id)->first();
            $customer['cust_emailverified']="yes";
            $customer->save();
            $cust_token['token_used']="yes";
            $cust_token->save();

             return response()->json([
                'status' => 'success',
                'message' => 'Email verifed! You will be redirected to the login page',
            ], 201);
        }elseif($token_db!=$token){
             return response()->json([
                'status' => 'invalid',
                'message' => 'Invalid verification code! Please provide the code sent to your email'
            ], 500);
        }elseif($actualTime>$token_expiration ||  $token_used=="yes"){
             return response()->json([
                'status' => 'expired',
                'message' => 'Verification code expired. Please click resend to generate a new one'
            ], 500);
        }

       }

        public function resendCode(Request $request){
            $datas=$request->all();
            $cust_id=$datas['cust_id'];
            //delete old token
            token::where('cust_id',$cust_id)->delete();
            //generate a new token and save
            $newtoken= $this->token_generation($cust_id);       
            $customer=Customer::where('cust_id',$cust_id)->first();

            $data=['fullName'=>$customer->cust_fullName,
                    'token'=>$newtoken["token"],
                    ] ;
            

            try{
                token::create($newtoken);
                Mail::send('emails.welcomeMail', $data, function($message) use ($customer) {
                $message->to($customer->cust_email, $customer->cust_fullName)
                ->subject('Welcome to Social Reader - Your Next Chapter Awaits');});
                return response()->json([
                'status' => 'success',
                'message' => 'New token generated and sent',
            ], 201);

            }catch(\Exception $e){
                return response()->json([
                'status' => 'error',
                'message' => 'error saving token'
            ], 500);
            }
            
            

       }
        //login Handler process
    public function loginHandler(Request $request){
        $validated=$request->validate(
                [
                    'cust_email'=>'required|email',
                    'cust_password'=>'required'
                ]
            );


        $customer = Customer::where('cust_email', $validated["cust_email"])->first();
        if(!$customer){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Email doesn\'t exist'
                    //401: unauthorized
                ], 401);
        }

        if($customer['cust_emailverified']=='yes'){
            if (Hash::check($request->cust_password, $customer->cust_password)) {
            
            // 3. Generate the Sanctum token
            // This requires 'use HasApiTokens' inside the Customer model
            $token = $customer->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Welcome to Social Reader',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'customer' => [
                    'name' => $customer->cust_fullName, // adjust based on your columns
                    'id' => $customer->cust_id
                ]
            ],200);
            }
            return response()->json([
                'status' => 'error', 
                'message' => 'Invalid  password'
            ], 401);

        }else{
            token::where('cust_id',$customer['cust_id'])->delete();
            //generate a new token and save
            $newtoken= $this->token_generation($customer['cust_id']);       
            $data=['fullName'=>$customer->cust_fullName,
                    'token'=>$newtoken["token"],
                    ] ;
            token::create($newtoken);
            Mail::send('emails.welcomeMail', $data, function($message) use ($customer) {
            $message->to($customer->cust_email, $customer->cust_fullName)
            ->subject('Welcome to Social Reader - Your Next Chapter Awaits');});
            
            return response()->json([
                'status' => 'error',
                'message' => 'Email not verified'
                //403 forbidden
            ], 403);   
        }


           

        
    }

           
        


        public function renderResetPassword(){
            return view('Auth/resetPassword');
        }

        public function checkEmail(Request $request){

            $datas=$request->all();
            $email=$datas['cust_email'];

            $customer=Customer::where('cust_email', $email)->first();
            if($customer){
                 return response()->json([
                        'status' => 'success',
                        'message' => 'User exist',

                ], 201);
                exit;
            }else{
                     return response()->json([
                        'status' => 'error',
                        'message' => 'Email not found'
                    ], 500);
                    exit;
            }
        }

        public function resetPassword(Request $request){
            $pattern = '/^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])(?=.{8,}).*$/';
            $data=$request->all();
            $pwd=$data['cust_password'];
            $cust_email= $data['cust_email'];
            if (preg_match($pattern, $pwd)) {
                $pwd=Hash::make($pwd);
                $customer=Customer::where('cust_email',$cust_email)->first();
                $customer->cust_password=$pwd;
                $customer->save();
                 return response()->json([
                        'status' => 'success',
                        'message' => 'Password sucessfully reset',

                ], 201);
               
            } else {
                return response()->json([
                'status' => 'error',
                'message' => 'The password should contain at least 8 character, 1 capital letter, 1 special character'
            ], 500);
            }

        }

        public function logout(Request $request){
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Token deleted successfully'
            ]);
        }
}

