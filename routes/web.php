<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'renderLogin'])->name('login');
Route::post('/login', [AuthController::class,'loginHandler']);
Route::get('/home', [HomeController::class,'renderHome']);
Route::post('/home', [HomeController::class,'renderHome']);

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

Route::get('/logout', [AuthController::class,'logout']);
Route::post('/logout', [AuthController::class,'logout']);

Route::get('/addBook', [LibraryController::class,'addBook']);
Route::post('/addBook', [LibraryController::class,'addBook']);

Route::get('/fetchBook', [LibraryController::class,'fetchBook']);
Route::post('/fetchBook', [LibraryController::class,'fetchBook']);