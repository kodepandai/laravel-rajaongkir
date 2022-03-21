<?php

namespace Kodepintar\LaravelRajaOngkir\Tests;

use Kodepintar\LaravelRajaOngkir\Provider\RajaOngkirServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            RajaOngkirServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-rajaongkir_table.php.stub';
        $migration->up();
        */
    }
}
