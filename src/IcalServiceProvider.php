<?php

namespace LukeUsher\Ical;

use Illuminate\Support\ServiceProvider;
use Eluceo\iCal\Component\Calendar;

class IcalServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ical.php',
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Calendar::class, function ($app) {
            return new Calendar(config('ical.url'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Calendar::class];
    }
}
