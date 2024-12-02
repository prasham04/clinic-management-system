<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        // $settings = cache()->remember(
        //     'settings',
        //      3600,
        //      fn() => Setting::all()->keyBy('key')
        //     );
        // View::share('settings', $settings);

        $this->app->bind('settings', function () {
            return Cache::rememberForever('settings', function () {
                return Setting::pluck('value', 'key');
            });
        });
    }
}
