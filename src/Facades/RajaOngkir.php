<?php

namespace Kodepintar\LaravelRajaOngkir\Facades;

use Illuminate\Support\Facades\Facade;
use Kodepintar\LaravelRajaOngkir\RajaOngkir as Accessor;

/**
 * @see \Kodepintar\LaravelRajaOngkir\LaravelRajaOngkir
 */
class RajaOngkir extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Accessor::class;
    }
}
