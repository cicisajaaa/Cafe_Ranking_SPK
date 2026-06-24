<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CafeController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\RankingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class,'showLogin']);
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.process');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])
        ->name('dashboard');

    Route::resource('/cafes', CafeController::class);
    Route::resource('/criteria', CriteriaController::class);

    Route::get('/ranking', [RankingController::class,'index'])
        ->name('ranking.index');

    Route::post('/ranking/calculate-topsis', [RankingController::class,'calculate'])
        ->name('ranking.calculate');

    Route::get('/ranking/pdf', [RankingController::class,'exportPdf'])
        ->name('ranking.pdf');
});

/*
|--------------------------------------------------------------------------
| STUDENT ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->group(function () {

    Route::get('/student-dashboard', [StudentController::class,'index'])
        ->name('student.dashboard');

    Route::get('/student-ranking', [StudentController::class,'ranking'])
        ->name('student.ranking');

    Route::get('/student-cafe/{id}', [StudentController::class,'showCafe'])
        ->name('student.cafe');
});

/*
|--------------------------------------------------------------------------
| OWNER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->group(function () {

    Route::get('/owner/dashboard', [OwnerController::class, 'index'])
        ->name('owner.dashboard');

    Route::get('/owner/ranking', [OwnerController::class, 'ranking'])
        ->name('owner.ranking');
});