<?php

namespace Kodepintar\LaravelRajaOngkir\Provider;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Kodepintar\LaravelRajaOngkir\RajaOngkir;

class RajaOngkirServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes(
            [__DIR__ . '/../../config/rajaongkir.php' => App::configPath('rajaongkir.php')],
            'rajaongkir-config'
        );
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/rajaongkir.php', 'rajaongkir');

        $this->app->bind('RajaOngkir', function () {
            return new RajaOngkir();
        });
    }
}
