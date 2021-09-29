<?php

namespace Kodepintar\LaravelRajaongkir;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kodepintar\LaravelRajaongkir\LaravelRajaongkir
 */
class LaravelRajaongkirFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-rajaongkir';
    }
}
