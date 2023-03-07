<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;

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

Route::get('/old', function () {
    return view('welcome');
}); // TODO subject to remove
Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/login', function () { return view('auth.login');})->name('login');
Route::post('/!/authenticate', [AuthController::class, 'login']);
Route::any('/admin', function () { return view('admin.dashboard');})->name('dashboard')/*->middleware('auth')*/;
