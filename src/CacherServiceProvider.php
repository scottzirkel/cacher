<?php

namespace SZ\Cacher;

use Blade;
use Illuminate\Support\ServiceProvider;

class CacherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache', function($expression) {
            return "<?php if (! SZ\Cacher\RussianCaching::setUp{$expression} ) { ?>";
        });

        Blade::directive('endcache', function() {
            return "<?php } echo SZ\Cacher\RussianCaching::tearDown() ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
