<?php

namespace App\Providers;

use App\Services\Geo\GeoServiceInterface;
use App\Services\Geo\IpApiGeoService;
use App\Services\Geo\MaxmindService;
use App\Services\UserAgent\UserAgentInterface;
use App\Services\UserAgent\UserAgentService;
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
        $this->app->singleton(GeoServiceInterface::class, function () {
//            return new MaxmindService();
            return new IpApiGeoService();
        });

        $this->app->singleton(UserAgentInterface::class, function () {
            return new UserAgentService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

