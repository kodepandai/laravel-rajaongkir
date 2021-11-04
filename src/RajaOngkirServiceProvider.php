<?php

namespace Kodepintar\LaravelRajaOngkir;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RajaOngkirServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rajaongkir.php', 'rajaongkir');
    }

    public function boot(): void
    {
        $this->publishes(
            [__DIR__ . '/../config/rajaongkir.php' => App::configPath('rajaongkir.php')],
            'rajaongkir-config'
        );
    }
}
