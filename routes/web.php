<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
//Route::get('login', )
Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->middleware('auth');
Route::resource('attendances', \App\Http\Controllers\Member\AttendanceController::class)->middleware('auth');


//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
//Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);


Route::get('/', function () {
    $attn = \App\Models\Attendance::all();
    return view('member.dashboard', compact('attn'));
})->middleware('auth');
