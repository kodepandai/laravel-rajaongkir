<?php

namespace Kodepintar\LaravelRajaongkir;

use Kodepintar\LaravelRajaongkir\Commands\LaravelRajaongkirCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRajaongkirServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-rajaongkir')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-rajaongkir_table')
            ->hasCommand(LaravelRajaongkirCommand::class);
    }
}
