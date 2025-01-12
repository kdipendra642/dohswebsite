<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ImportantLinkController;
use App\Http\Controllers\Backend\PopUpController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\TickerController;
use App\Http\Controllers\Backend\UsefulToolController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VideoGalleryController;
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

    Route::resource('/users', UserController::class)->except(['show']);
    Route::get('/users/data', [UserController::class, 'usersData'])->name('users.data');

    Route::resource('/sliders', SliderController::class)->except(['show']);
    Route::get('/sliders/data', [SliderController::class, 'slidersData'])->name('sliders.data');

    Route::resource('/tickers', TickerController::class)->except(['show']);
    Route::get('/tickers/data', [TickerController::class, 'tickersData'])->name('tickers.data');

    Route::resource('/sitesettings', SiteSettingController::class)->except(['update', 'edit', 'update', 'destroy']);

    Route::resource('/staffs', StaffController::class)->except(['show']);
    Route::get('/staffs/data', [StaffController::class, 'staffsData'])->name('staffs.data');

    Route::resource('/staffs', StaffController::class);

    Route::resource('/importantlinks', ImportantLinkController::class)->except(['show']);
    Route::get('/importantlinks/data', [ImportantLinkController::class, 'importantLinksData'])->name('importantlinks.data');

    Route::resource('/galleries', GalleryController::class);

    Route::resource('/categories', CategoryController::class)->except(['show']);
    Route::get('/categories/data', [CategoryController::class, 'categoriesData'])->name('categories.data');

    Route::resource('/posts', PostController::class)->except(['show']);
    Route::get('/posts/data', [PostController::class, 'postsData'])->name('posts.data');

    Route::resource('/popups', PopUpController::class)->except(['show']);
    Route::get('/popups/data', [PopUpController::class, 'popupsData'])->name('popups.data');

    Route::resource('/video/galleries', VideoGalleryController::class)->except(['show']);
    Route::get('/video/galleries/data', [VideoGalleryController::class, 'galleriesData'])->name('galleries.data');

    Route::resource('/contact/messages', ContactMessageController::class)->except(['store', 'update', 'edit', 'show']);
    Route::get('/contact/messages/data', [ContactMessageController::class, 'messagesData'])->name('messages.data');

    Route::get('/delete/media/{id}', [GalleryController::class, 'deleteMedia'])->name('delete.image');

    Route::get('/setting/menu', [DashboardController::class, 'settingMenu'])->name('setting.menu');

    Route::get('/profile', [AuthController::class, 'myProfile'])->name('profile');
    Route::post('/update/password/{userId}', [AuthController::class, 'updatePassword'])->name('password.update');

    Route::resource('/usefultools', UsefulToolController::class)->except(['show']);
    Route::get('/usefultools/data', [UsefulToolController::class, 'usefultoolsData'])->name('usefultools.data');
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

Route::get('/all/popups', [IndexController::class, 'popupsIndex'])->name('popups.all');
Route::get('/single/popups/{slug}', [IndexController::class, 'popupSingle'])->name('popups.single');

Route::get('/index/gallery', [IndexController::class, 'indexGallery'])->name('gallery.index');
Route::get('/gallery/{slug}', [IndexController::class, 'gallery'])->name('gallery');

Route::get('/index/staffs', [IndexController::class, 'indexStaffs'])->name('index.staffs');
Route::get('/single/staffs/{staffId}', [IndexController::class, 'singleStaffs'])->name('single.staffs');

Route::get('/locale/{lang}', [LocaleController::class, 'setLocale'])->name('lang.setup');
