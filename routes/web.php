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
use Illuminate\Support\Facades\Artisan;


Route::get('/symlink', function() {
    // $target = '/home/dohsgov/public_html/hmis-web/storage/app/public';
    $target = '/home/dohsgov/public_html/hmis-web/public/media';
    $shortcut = '/home/dohsgov/public_html/media';
    symlink($target, $shortcut);
    echo "Symlink created from $target to $shortcut";
});

Route::get('composer', function() {
    $output = [];
        $returnCode = 0;

        // Execute the composer install command
        exec('composer install --ignore-platform-reqs 2>&1', $output, $returnCode);

         if ($returnCode === 0) {
            return response()->json([
                'status' => 'success',
                'message' => 'Composer install completed successfully.',
                'output' => $output,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to run composer install.',
                'output' => $output,
            ], 500);
        }
});

Route::get('/clear', function() {
    Artisan::call('migrate');
    Artisan::call('optimize:clear');
    return "cache clear";
});


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

    Route::resource('/contact/messages', ContactMessageController::class)->except(['store', 'update', 'edit', 'show']);
    Route::get('/contact/messages/data', [ContactMessageController::class, 'messagesData'])->name('messages.data');

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
