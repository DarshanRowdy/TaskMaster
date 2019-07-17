<?php

namespace DevDr\Dr;

use Illuminate\Support\ServiceProvider;

class DrServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('DevDr\Dr\CalculatorController');
        $this->loadViewsFrom(__DIR__.'/View', 'Dr');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';
    }
}
