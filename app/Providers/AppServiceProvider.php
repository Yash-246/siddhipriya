<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            $origin = rtrim(
                (string) config('app.url', 'https://siddhipriya-alpha.vercel.app'),
                '/'
            );

            URL::useOrigin($origin);
            URL::useAssetOrigin($origin);
            URL::forceHttps();
        }
    }
}
