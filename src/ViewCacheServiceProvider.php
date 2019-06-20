<?php

namespace PiruPius\LaravelViewCache;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewCacheServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache', function ($expression) {
            return "<?php if(!App\ViewCaching::setUp({$expression})) { ?>";
        });

        Blade::directive('endcache', function () {
            return "<?php } echo App\ViewCaching::tearDown() ?>";
        });
    }
}
