<?php

namespace Kodepintar\LaravelRajaOngkir\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed getProvince()
 * @method static mixed getCity()
 * @method static mixed getSubdistrict()
 * @method static mixed getCost(int $origin, string $originType, int $destination, string $destinationType, int $weight, string $courier)
 * @method static mixed getInternationalOrigin(int $idCity, int $province)
 * @method static mixed getInternationalCountry()
 * @method static mixed getInternationalDestination(int $idCountry)
 * @method static mixed getInternationalCost(int $origin, int $destination, int $weight, string $courier)
 * @method static mixed getCurrency()
 * @method static mixed getTracking(string $noResi, string $courier)
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
