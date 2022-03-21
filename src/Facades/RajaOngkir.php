<?php

namespace Kodepintar\LaravelRajaOngkir\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void getProvince()
 * @method static void getCity()
 * @method static void getSubdistrict()
 * @method static void getCost(int $origin, string $originType, int $destination, string $destinationType, int $weight, string $courier)
 * @method static void getInternationalOrigin(int $idCity, int $province)
 * @method static void getInternationalCountry()
 * @method static void getInternationalDestination(int $idCountry)
 * @method static void getInternationalCost(int $origin, int $destination, int $weight, string $courier)
 * @method static void getCurrency()
 * @method static void getTracking(string $noResi, string $courier)
 *
 * @see \Kodepintar\LaravelRajaOngkir\RajaOngkir
 */
class RajaOngkir extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'RajaOngkir';
    }
}
