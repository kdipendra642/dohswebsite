<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactMessageRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\ImportantLinkRepository;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ContactMessageRepositoryInterface;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Repositories\Interfaces\ImportantLinkRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\SiteSettingRepositoryInterface;
use App\Repositories\Interfaces\SliderRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\Interfaces\TickerRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\SiteSettingRepository;
use App\Repositories\SliderRepository;
use App\Repositories\StaffRepository;
use App\Repositories\TickerRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            abstract: BaseRepositoryInterface::class,
            concrete: BaseRepository::class
        );

        $this->app->bind(
            abstract: UserRepositoryInterface::class,
            concrete: UserRepository::class
        );

        $this->app->bind(
            abstract: SliderRepositoryInterface::class,
            concrete: SliderRepository::class
        );

        $this->app->bind(
            abstract: TickerRepositoryInterface::class,
            concrete: TickerRepository::class
        );

        $this->app->bind(
            abstract: SiteSettingRepositoryInterface::class,
            concrete: SiteSettingRepository::class
        );

        $this->app->bind(
            abstract: StaffRepositoryInterface::class,
            concrete: StaffRepository::class
        );

        $this->app->bind(
            abstract: ImportantLinkRepositoryInterface::class,
            concrete: ImportantLinkRepository::class
        );

        $this->app->bind(
            abstract: GalleryRepositoryInterface::class,
            concrete: GalleryRepository::class
        );

        $this->app->bind(
            abstract: CategoryRepositoryInterface::class,
            concrete: CategoryRepository::class
        );

        $this->app->bind(
            abstract: PostRepositoryInterface::class,
            concrete: PostRepository::class
        );

        $this->app->bind(
            abstract: ContactMessageRepositoryInterface::class,
            concrete: ContactMessageRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
