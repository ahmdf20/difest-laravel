<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\GradingCriteriaController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubmissionGradingController;
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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });



Route::controller(CustomAuthController::class)->group(function () {
    Route::post('/custom/login', 'credentials')->name('custom.login');
    Route::get('/custom/logout', 'logout')->name('custom.logout');
});

Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');

Route::controller(UserController::class)->middleware('auth')->middleware('check-role:admin,commite')->group(function () {
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

Route::controller(SubmissionController::class)->middleware('auth')->middleware('check-role:admin,commite')->group(function () {
    Route::get('/submission/index', 'index')->name('submission');
    Route::get('/submission/tambah', 'tambah')->name('submission.tambah');

    Route::post('/submission/store', 'store')->name('submission.store');
});

Route::controller(GradingCriteriaController::class)->middleware('auth')->middleware('check-role:admin,commite')->group(function () {
    Route::get('/grading-criteria/index', 'index')->name('grading-criteria');
    Route::get('/grading-criteria/tambah', 'tambah')->name('grading-criteria.tambah');
    Route::get('/grading-criteria/{grading_criteria}/edit', 'edit')->name('grading-criteria.edit');
    Route::get('/grading-criteria/{grading_criteria}/hapus', 'softdelete')->name('grading-criteria.softdelete');

    Route::post('/grading-criteria/store', 'store')->name('grading-criteria.store');

    Route::put('/grading-criteria/{grading_criteria}/update', 'update')->name('grading-criteria.update');
});

Route::controller(SubmissionGradingController::class)->middleware('auth')->middleware('check-role:admin,commite,judge')->group(function () {
    Route::get('/submission-grading', 'index')->name('submission-grading');
    Route::get('/submission-grading/{submission}/penilaian-karya', 'penilaian_karya')->name('submission-grading.penilaian-karya');
    Route::get('/submission-grading/{submission}/penilaian-presentasi', 'penilaian_presentasi')->name('submission-grading.penilaian-presentasi');

    Route::post('/submission-grading/{submission}/penilaian-karya/store', 'penilaian_karya_store')->name('submission-grading.penilaian-karya.store');
    Route::post('/submission-grading/{submission}/penilaian-presentasi/store', 'penilaian_presentasi_store')->name('submission-grading.penilaian-presentasi.store');
});
