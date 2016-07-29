<?php

namespace Germey\SweetAlert;

use Illuminate\Support\ServiceProvider;

class SweetAlertServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Germey\SweetAlert\SessionStore',
            'Germey\SweetAlert\LaravelSessionStore'
        );

        $this->app->singleton('sweetalert', function () {
            return $this->app->make('Germey\SweetAlert\SweetAlertNotifier');
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'sweet');

        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/sweet'),
        ]);
    }
}
