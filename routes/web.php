<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'renderLogin']);
Route::post('/login', [AuthController::class,'loginHandler']);

Route::get('/register', [AuthController::class,'renderRegistration']);
Route::post('/register', [AuthController::class,'registerCustomer']);

Route::get('/emailVerification', [AuthController::class,'renderEmailVerification']);
Route::post('/emailVerification', [AuthController::class,'emailVerificationHandler']);

Route::get('/resendCode', [AuthController::class,'resendCode']);
Route::post('/resendCode', [AuthController::class,'resendCode']);

Route::get('/resetPassword', [AuthController::class,'renderResetPassword']);
Route::post('/resetPassword', [AuthController::class,'resetPassword']);

Route::get('/checkEmail', [AuthController::class,'checkEmail']);
Route::post('/checkEmail', [AuthController::class,'checkEmail']);
