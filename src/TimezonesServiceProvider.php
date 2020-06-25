<?php

namespace Rnagda99\Calculator;

use Illuminate\Support\ServiceProvider;

class TimezonesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->make('Rnagda99\Calculator\CalculatorController');

      $this->app->bind('Rnagda99\Calculator\Track', function ($app) {
        return new Track();
      });
    }
}
