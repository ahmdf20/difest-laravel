<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(CustomAuthController::class)->group(function () {
    Route::post('/custom/login', 'credentials')->name('custom.login');
    Route::get('/custom/logout', 'logout')->name('custom.logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/dashboard', 'index')->name('user.dashboard');
    Route::get('/user/participant', 'participant')->name('user.participant');
});
