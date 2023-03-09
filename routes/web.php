<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () { return view('welcome');});
Route::get('/login', function () { return view('auth.login');})->name('login');
Route::any('/!/authenticate', [AuthController::class, 'authenticate']);

Route::any('/!/add-user', [UserController::class, 'sendUserEmail']);
Route::any('/!/new-user', [FrontendController::class, 'newUser']);
Route::any('/!/store-user', [UserController::class, 'storeNewUser']);
Route::any('/!/update-user-role', [UserController::class, 'updateUserRole']);

Route::any('/admin', function () { return view('admin.dashboard');})->name('dashboard')->middleware('auth');
Route::get('/admin/register', function () { return view('auth.register');})->name('admin.register')->middleware('auth');
Route::get('/admin/users', [FrontendController::class, 'showUsers'])->name('admin.users')->middleware('auth');
Route::any('/admin/users/verify', [UserController::class, 'verifyUser']);
