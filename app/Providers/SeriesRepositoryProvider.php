<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\ISeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ISeriesRepository::class, EloquentSeriesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
