<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//landing page
Route::get('/', function () {return view('index');})->name('home');

//register
Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'store']);

//login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);

//forgot password
Route::get('/forgotpassword', [ForgotPasswordController::class, 'show'])->name('forgotpassword')->middleware('guest');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'store'])->name('forgotpassword');

//reset password
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])->name('resetpassword')->middleware('guest');
Route::put('/reset-password', [ForgotPasswordController::class, 'update'])->name('resetpassword.post')->middleware('guest');

//logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//show all listing
Route::get('/hobby', [HobbyController::class, 'index'])->name('hobby')->middleware('auth');
Route::post('/hobby', [HobbyController::class, 'store']);

//show single listing
Route::get('/hobby/{hobby}', [HobbyController::class, 'show'])->name('show')->middleware('auth');
//show edit forms
Route::get('/hobby/{hobby}/edit', [HobbyController::class, 'edit']);
//update the hobby
Route::put('/hobby/{hobby}', [HobbyController::class, 'update']);
// delete
Route::delete('/hobby/{hobby}', [HobbyController::class, 'destroy'])->name('destroy');

Route::get('/dashboard', [HobbyController::class, 'display'])->name('dashboard')->middleware('auth');
