<?php

namespace App\Providers;

use App\Repositories\CarRepositoryImpl;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Impl\CarRepository;
use App\Repositories\Repository;
use App\Services\CarServiceImpl;
use App\Services\Impl\CarService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Repository::class, EloquentRepository::class);

        $this->app->singleton(CarRepositoryImpl::class, CarRepository::class);
        $this->app->singleton(CarServiceImpl::class, CarService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
