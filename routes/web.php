<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'renderLogin']);

Route::get('/register', [AuthController::class,'renderRegistration']);

Route::post('/register', [AuthController::class,'registerCustomer']);

Route::get('/emailVerification', [AuthController::class,'renderEmailVerification']);