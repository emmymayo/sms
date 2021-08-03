<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MultiDatabaseHandler;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->singleton(new MultiDatabaseHandler);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('settings',Setting::all());
    }
}
