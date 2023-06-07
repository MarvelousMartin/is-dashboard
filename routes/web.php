<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () { return view('admin.dashboard');});
Route::get('login', function () { return view('auth.login');})->name('login');
Route::any('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::any('add-user', [UserController::class, 'sendUserEmail'])->name('add-user');
Route::any('new-user', [FrontendController::class, 'newUser'])->name('new-user');
Route::any('store-user', [UserController::class, 'storeNewUser'])->name('store-user');
Route::any('update-user-role', [UserController::class, 'updateUserRole'])->name('update-user-role');

Route::any('admin', [AdminController::class, 'admin'])->name('admin.dashboard')->middleware('auth');
Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register')->middleware('auth');
Route::get('admin/timeline', [AdminController::class, 'timeline'])->name('admin.timeline')->middleware('auth');
Route::get('admin/calendar', [AdminController::class, 'calendar'])->name('admin.calendar')->middleware('auth');
Route::get('admin/users', [FrontendController::class, 'showUsers'])->name('admin.users')->middleware('auth');
Route::any('admin/users/verify', [UserController::class, 'verifyUser'])->name('admin.users.verify')->middleware('auth');

Route::redirect('admin/archive', 'admin', 301)->name('admin.archive')->middleware('auth');
