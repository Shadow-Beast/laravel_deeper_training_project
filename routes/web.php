<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MeetingController;
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

Route::get('/', [MeetingController::class, 'index'])->name('home');
Route::post('meeting/save', [MeetingController::class, 'save'])
    ->middleware('auth')
    ->name('meeting.save');
Route::delete('meeting/{id}', [MeetingController::class, 'destroy'])->name('meeting.destroy');

Route::get('login', [AuthenticatedSessionController::class, 'show'])
    ->middleware('guest')
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'login'])
    ->middleware('guest');

Route::post('logout', [AuthenticatedSessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Google
Route::get('google/login', [GoogleController::class, 'login'])
    ->middleware('guest')
    ->name('google.login');

Route::any('google/callback', [GoogleController::class, 'callback'])
    ->middleware('guest')
    ->name('google.callback');

// Facebook
Route::get('facebook/login', [FacebookController::class, 'login'])
    ->middleware('guest')
    ->name('facebook.login');

Route::any('facebook/callback', [FacebookController::class, 'callback'])
    ->middleware('guest')
    ->name('facebook.callback');
