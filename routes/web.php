<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ImportantLinkController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\TickerController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'signin'])->name('login.signin');
Route::post('/logout', [AuthController::class, 'signout'])->name('login.signout');

// Backend Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboards', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/users', UserController::class);

    Route::resource('/sliders', SliderController::class);

    Route::resource('/tickers', TickerController::class);

    Route::resource('/sitesettings', SiteSettingController::class)->except(['update', 'edit', 'update', 'destroy']);

    Route::resource('/staffs', StaffController::class);

    Route::resource('/staffs', StaffController::class);

    Route::resource('/importantlinks', ImportantLinkController::class);

    Route::resource('/galleries', GalleryController::class);

    Route::get('/delete/media/{id}', [GalleryController::class, 'deleteMedia'])->name('delete.image');

});

// Routes For Frontend
Route::get('/', [IndexController::class, 'index'])->name('index');
