<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ImportantLinkController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\TickerController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Base\LocaleController;
use App\Http\Controllers\Frontend\ContactMessageController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;


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

    Route::resource('/categories', CategoryController::class);

    Route::resource('/posts', PostController::class)->except(['show']);
    Route::get('/posts/data', [PostController::class, 'postsData'])->name('posts.data');

    Route::resource('/contact/messages', ContactMessageController::class)->except(['store', 'update', 'edit', 'show']);

    Route::get('/delete/media/{id}', [GalleryController::class, 'deleteMedia'])->name('delete.image');

    Route::get('/setting/menu', [DashboardController::class, 'settingMenu'])->name('setting.menu');

    Route::get('/profile', [AuthController::class, 'myProfile'])->name('profile');
    Route::post('/update/password/{userId}', [AuthController::class, 'updatePassword'])->name('password.update');
});


// Routes For Frontend
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/contact-us', [IndexController::class, 'contact'])->name('contact');

Route::post('/contact-us/store', [ContactMessageController::class, 'store'])->name('messages.store');

Route::get('/single/tickers/{slug}', [IndexController::class, 'tickers'])->name('single.tickers');

Route::get('/index/categories', [IndexController::class, 'category'])->name('category.index');

Route::get('/posts/category/{categoryId}', [IndexController::class, 'categorywisePost'])->name('category.post');
Route::get('/posts/single/{slug}', [IndexController::class, 'singlePost'])->name('posts.single');
Route::get('/posts/subcatewise/{subcategory}', [IndexController::class, 'subcatewisePost'])->name('subcategory.post');

Route::get('/index/gallery', [IndexController::class, 'indexGallery'])->name('gallery.index');
Route::get('/gallery/{slug}', [IndexController::class, 'gallery'])->name('gallery');

Route::get('/index/staffs', [IndexController::class, 'indexStaffs'])->name('index.staffs');
Route::get('/single/staffs/{staffId}', [IndexController::class, 'singleStaffs'])->name('single.staffs');

Route::get('/locale/{lang}', [LocaleController::class, 'setLocale'])->name('lang.setup');
