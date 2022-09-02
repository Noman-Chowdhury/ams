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

Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->middleware('auth');
Route::resource('attendances', \App\Http\Controllers\Member\AttendanceController::class)->only(['index', 'store'])->middleware('auth');
Route::get('log',[\App\Http\Controllers\Member\AttendanceController::class, 'getLog'])->middleware('auth')->name('log');

Route::get('/', function () {
    if (\auth()->user()->isAdmin()){
        return view('admin.dashboard');
    }
    return view('member.dashboard');
})->middleware('auth')->name('home');
