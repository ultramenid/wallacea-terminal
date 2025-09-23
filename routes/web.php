<?php

use App\Http\Controllers\AksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\RisetsController;
use App\Http\Middleware\AuthBasic;
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
        Route::get('/news', [NewsController::class, 'index'])->name('news');
        Route::get('/riset/{id}/{slug}', [RisetsController::class, 'detailriset'])->name('detailriset');
        Route::get('/risets', [RisetsController::class, 'listrisets'])->name('risets');
        Route::get('/risets/{category}', [RisetsController::class, 'categoryriset'])->name('categoryriset');
        Route::get('/aksi', [AksiController::class, 'index'])->name('aksi');
        Route::get('/aksi/{id}/{slug}', [AksiController::class, 'detailaksi'])->name('detailaksi');
        Route::get('/regulasi', [RegulasiController::class, 'index'])->name('regulasi');
        Route::get('/aksi/{category}', [AksiController::class, 'categoryaksi'])->name('categoryaksi');

        Route::middleware(AuthBasic::class)->group(function () {
            Route::get('/preview/{id}', [NewsController::class, 'detailpreview'])->name('detailpreview');
        });

    });
});


//redirect to login page if user has no session
Route::middleware([checkSession::class])->group(function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index']);
    Route::get('/cms/listnews', [NewsController::class, 'listsnews']);
    Route::get('/cms/addinternal', [NewsController::class, 'addinternal']);
    Route::get('/cms/addeksternal', [NewsController::class, 'addeksternal']);
    Route::get('/cms/editnews/{id}', [NewsController::class, 'editnews']);
    Route::get('/cms/editeksternal/{id}', [NewsController::class, 'editeksternal']);
    Route::get('/cms/listrisets', [RisetsController::class, 'index']);
    Route::get('/cms/addriset', [RisetsController::class, 'addriset']);
    Route::get('/cms/editriset/{id}', [RisetsController::class, 'editriset']);
    Route::get('/cms/listaksi', [AksiController::class, 'listaksi']);
    Route::get('/cms/addaksi', [AksiController::class, 'addaksi']);
    Route::get('/cms/editaksi/{id}', [AksiController::class, 'editaksi']);



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
