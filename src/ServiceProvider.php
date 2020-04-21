<?php

namespace Mikemartin\Connect;
use Illuminate\Support\Facades\Route;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Facades\CP\Nav;

class ServiceProvider extends AddonServiceProvider
{

    protected $listen = [
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\\Aweber\\AweberExtendSocialite@handle',
        ],
    ];

    /**
     * Bootstrap application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'connect');

        $this->mergeConfigFrom(__DIR__.'/../config/connect.php', 'connect');

        $this->publishes([
            __DIR__.'/../config/connect.php' => config_path('connect.php'),
        ], 'config');

        Nav::extend(function ($nav) {
            $nav->content('Connect')
                ->route('connect.index')
                ->icon('users');
        });

        $this->registerCpRoutes(function () {
            Route::name('connect.')->prefix('connect')->group(function () {
                Route::get('/', 'ConnectController@index')->name('index');
            });
        });

    }

    public function register()
    {
        config(['services.connect' => config('connect.service')]);
    }


}
