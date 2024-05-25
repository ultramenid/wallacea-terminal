<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RisetsController;
use App\Http\Middleware\checkSession;
use App\Http\Middleware\hasSession;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [IndexController::class, 'index'])->name('index');

//redirect to login page if user has no session
Route::middleware([checkSession::class])->group(function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index']);
    Route::get('/cms/news', [NewsController::class, 'index']);
    Route::get('/cms/news/addinternal', [NewsController::class, 'addinternal']);
    Route::get('/cms/news/addeksternal', [NewsController::class, 'addeksternal']);
    Route::get('/cms/news/editnews/{id}', [NewsController::class, 'editnews']);
    Route::get('/cms/news/editeksternal/{id}', [NewsController::class, 'editeksternal']);
    Route::get('/cms/risets', [RisetsController::class, 'index']);
    Route::get('/cms/risets/addriset', [RisetsController::class, 'addriset']);



    Route::group(['prefix' => 'cms/wallacea-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

//redirect to dashboard if user has session to dashboard
Route::middleware([hasSession::class])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
});

//url to logout session
Route::get('/cms/logout', function () {
    session()->flush();
    return redirect('/login');
});
