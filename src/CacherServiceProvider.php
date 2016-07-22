<?php

namespace Cacher;

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
            return "<?php if (! app('Cacher\BladeDirective')->setUp{$expression} ) { ?>";
        });

        Blade::directive('endcache', function() {
            return "<?php } echo app('Cacher\BladeDirective')->tearDown() ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BladeDirective::class, function () {
            return new BladeDirective();
        });
    }
}
