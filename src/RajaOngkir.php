<?php

namespace Kodepintar\LaravelRajaOngkir;

use Illuminate\Support\Facades\Http;

class RajaOngkir
{
  
    protected static $BASE_URL = [
        'starter' => 'https://api.rajaongkir.com/starter',
        'basic' => 'https://api.rajaongkir.com/basic',
        'pro' => 'https://pro.rajaongkir.com/api',
    ];

    protected static $url = null;

    public function __construct()
    {
        $accountType = config('rajaongkir.ACCOUNT_TYPE', env('RAJAONGKIR_TYPE'));

        self::$url = self::$BASE_URL[$accountType];

        return $this;
    }


    protected static function apiCall(string $urlPath, array $payload = [], string $method = 'GET')
    {
        $url = self::$url . '/' . ltrim($urlPath, '/');

        return Http::withHeaders([
            'key' => config('rajaongkir.API_KEY', env('RAJAONGKIR_KEY')),
            'content-type' => 'application/x-www-form-urlencoded',
        ])->{strtolower($method)}($url, $payload);
    }

    /**
     * Method "province" digunakan untuk mendapatkan daftar propinsi yang ada di Indonesia.
     *
     * @return void
     */
    public static function getProvince()
    {
        return self::apiCall('/province');
    }

    /**
     * Method "city" digunakan untuk mendapatkan daftar kota/kabupaten yang ada di Indonesia.
     *
     * @return void
     */
    public static function getCity()
    {
        return self::apiCall('/city');
    }

    /**
     * Method "subdistrict" digunakan untuk mendapatkan daftar kecamatan yang ada di Indonesia.
     *
     * @return void
     */
    public static function getSubdistrict()
    {
        return self::apiCall('/subdistrict');
    }

    /**
     * Method “cost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim) dari dan ke kecamatan tujuan tertentu dengan berat tertentu.
     *
     * @param int $origin
     * @param string $originType
     * @param int $destination
     * @param string $destinationType
     * @param int $weight
     * @param string $courier
     * @return void
     */
    public static function getCost(int $origin, string $originType, int $destination, string $destinationType, int $weight, string $courier)
    {
        return self::apiCall('/subdistrict', [
            "origin" => $origin,
            "originType" => $originType,
            "destination" => $destination,
            "destinationType" => $destinationType,
            "weight" => $weight,
            "courier" => $courier,
        ], 'POST');
    }

    /**
     * Method "internationalOrigin" digunakan untuk mendapatkan daftar/nama kota yang mendukung pengiriman internasional.
     *
     * @param int $idCity
     * @param int $province
     * @return void
     */
    public static function getInternationalOrigin(int $idCity, int $province)
    {
        return self::apiCall('/v2/internationalOrigin', [
            "id" => $idCity,
            "province" => $province,
        ]);
    }

    /**
     * JMethod "getInternationalCountry" menampilkan semua negara pengiriman internasional.
     *
     * @return void
     */
    public static function getInternationalCountry()
    {
        return self::apiCall('/v2/internationalDestination');
    }

    /**
     * Method "internationalDestination" digunakan untuk mendapatkan daftar/nama negara tujuan pengiriman internasional.
     *
     * @param int $idCountry
     * @return void
     */
    public static function getInternationalDestination(int $idCountry)
    {
        return self::apiCall('/v2/internationalDestination', [
            "id" => $idCountry,
        ]);
    }

    /**
     * Method “internationalCost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim)
     * internasional dari kota-kota di Indonesia ke negara tujuan di seluruh dunia.
     *
     * @param int $origin
     * @param int $destination
     * @param int $weight
     * @param string $courier
     * @return void
     */
    public static function getInternationalCost(int $origin, int $destination, int $weight, string $courier)
    {
        return self::apiCall('/v2/internationalCost', [
            "origin" => $origin,
            "destination" => $destination,
            "weight" => $weight,
            "courier" => $courier,
        ], 'POST');
    }

    /**
     * Method "currency" digunakan untuk mendapatkan informasi nilai tukar rupiah terhadap US dollar.
     *
     * @return void
     */
    public static function getCurrency()
    {
        return self::apiCall('/currency');
    }

    /**
     * Method "getTracking" untuk digunakan melacak/mengetahui status pengiriman berdasarkan nomor resi.
     *
     * @param string $noResi
     * @param string $courier
     * @return void
     */
    public static function getTracking(string $noResi, string $courier)
    {
        return self::apiCall('/waybill', [
            "waybill" => $noResi,
            "courier" => $courier,
        ], 'POST');
    }
}
