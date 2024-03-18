<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\SubmissionController;
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
    return redirect()->route('login');
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

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/user/dashboard', 'index')->name('user.dashboard');
    Route::get('/user/participant', 'participant')->name('user.participant');
    Route::get('/user/commite', 'commite')->name('user.commite');
    Route::get('/user/judge', 'judge')->name('user.judge');

    Route::get('/user/commite/tambah', 'commite_tambah')->name('user.commite.tambah');
    Route::get('/user/commite/{user}/hapus', 'commite_softdelete')->name('user.commite.softdelete');
    Route::get('/user/commite/{user}/edit', 'commite_edit')->name('user.commite.edit');

    Route::get('/user/judge/tambah', 'judge_tambah')->name('user.judge.tambah');
    Route::get('/user/judge/{user}/hapus', 'judge_softdelete')->name('user.judge.softdelete');
    Route::get('/user/judge/{user}/edit', 'judge_edit')->name('user.judge.edit');

    Route::post('/user/commite/store', 'commite_store')->name('user.commite.store');
    Route::post('/user/judge/store', 'judge_store')->name('user.judge.store');

    Route::put('/user/commite/{user}/update', 'commite_update')->name('user.commite.update');
    Route::put('/user/judge/{user}/update', 'judge_update')->name('user.judge.update');
});

Route::controller(SubmissionController::class)->middleware('auth')->group(function () {
    Route::get('/submission/index', 'index')->name('submission');
});
