<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RisetsController;
use App\Http\Middleware\checkSession;
use App\Http\Middleware\hasSession;
use App\Http\Middleware\setLanguage;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::redirect('/', '/id');
Route::middleware([setLanguage::class])->group(function () {
    Route::group(['prefix' => '{lang}'], function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/data', [DataController::class, 'index'])->name('data');
        Route::get('/news/{id}/{slug}', [NewsController::class, 'detailnews'])->name('detailnews');
        Route::get('/news/internasional', [NewsController::class, 'internasional'])->name('internasionalnews');
        Route::get('/news/nasional', [NewsController::class, 'nasional'])->name('nasionalnews');
        Route::get('/news/{region}', [NewsController::class, 'region'])->name('regionnews');
    });
});


//redirect to login page if user has no session
Route::middleware([checkSession::class])->group(function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index']);
    Route::get('/cms/news', [NewsController::class, 'index']);
    Route::get('/cms/addinternal', [NewsController::class, 'addinternal']);
    Route::get('/cms/addeksternal', [NewsController::class, 'addeksternal']);
    Route::get('/cms/editnews/{id}', [NewsController::class, 'editnews']);
    Route::get('/cms/editeksternal/{id}', [NewsController::class, 'editeksternal']);
    Route::get('/cms/risets', [RisetsController::class, 'index']);
    Route::get('/cms/addriset', [RisetsController::class, 'addriset']);



    Route::group(['prefix' => 'cms/wallacea-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

//redirect to dashboard if user has session to dashboard
Route::middleware([hasSession::class])->group(function () {
    Route::get('/cms/login', [LoginController::class, 'index']);
});

//url to logout session
Route::get('/cms/logout', function () {
    session()->flush();
    return redirect('/cms/login');
});
