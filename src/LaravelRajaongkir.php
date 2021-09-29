<?php

namespace Kodepintar\LaravelRajaongkir;

use Illuminate\Support\Facades\Http;

class LaravelRajaongkir
{
    private static $baseurl_starter = 'https://api.rajaongkir.com/starter';
    private static $baseurl_basic = 'https://api.rajaongkir.com/basic';
    private static $baseurl_pro = 'https://pro.rajaongkir.com/api';

    protected $url = null;

    public function __construct()
    {
        $config = config('ongkir.APIKEY_RAJAONGKIR', 'starter');

        switch ($config) {
            case 'starter':
                return $this->url =  $this->baseurl_starter;
                break;

            case 'basic':
                return $this->url = $this->baseurl_basic;
                break;

            case 'pro':
                return $this->url = $this->baseurl_pro;
                break;

            default:
                return $this->url = $this->baseurl_starter;
                break;
        }
    }

    protected function requestHeader()
    {
        return Http::withHeaders([
            'key'          => config('ongkir.APIKEY_RAJAONGKIR'),
            'content-type' => 'application/x-www-form-urlencoded'
        ]);
    }

    /**
     * Method "province" digunakan untuk mendapatkan daftar propinsi yang ada di Indonesia.
     */
    public function getProvince()
    {
        return $this->requestHeader()->get($this->url . '/province');
    }

    /**
     * Method "city" digunakan untuk mendapatkan daftar kota/kabupaten yang ada di Indonesia.
     */
    public function getCity()
    {
        return $this->requestHeader()->get(self::$url . '/city');
    }

    /**
     * Method "subdistrict" digunakan untuk mendapatkan daftar kecamatan yang ada di Indonesia.
     */
    public function getSubdistrict()
    {
        return $this->requestHeader()->get(self::$url . '/subdistrict');
    }

    /**
     * Method “cost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim) dari dan ke kecamatan tujuan tertentu dengan berat tertentu.
     *
     * @param [int] $origin
     * @param [string] $originType
     * @param [int] $destination
     * @param [string] $destinationType
     * @param [int] $weight
     * @param [string] $courier
     * @return void
     */
    public function getCost($origin, $originType, $destination, $destinationType, $weight, $courier)
    {
        return $this->requestHeader()->post(self::$url . '/subdistrict', [
            "origin"          => $origin,
            "originType"      => $originType,
            "destination"     => $destination,
            "destinationType" => $destinationType,
            "weight"          => $weight,
            "courier"         => $courier
        ]);
    }

    /**
     * Method "internationalOrigin" digunakan untuk mendapatkan daftar/nama kota yang mendukung pengiriman internasional.
     *
     * @param [int] $internationalOrigin
     * @param [int] $province
     * @return void
     */
    public function getInternationalOrigin($internationalOrigin, $province)
    {
        return $this->requestHeader()->get(self::$url . '/v2/internationalOrigin', [
            "internationalOrigin" => $internationalOrigin,
            "province"            => $province
        ]);
    }

    /**
     * Method "internationalDestination" digunakan untuk mendapatkan daftar/nama negara tujuan pengiriman internasional.
     *
     * @param [int] $idCountry
     * @return void
     */
    public function getInternationalDestination($idCountry)
    {
        return $this->requestHeader()->get(self::$url . '/v2/internationalDestination', [
            "id" => $idCountry,
        ]);
    }

    /**
     * Method “internationalCost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim)
     * internasional dari kota-kota di Indonesia ke negara tujuan di seluruh dunia.
     *
     * @param [int] $origin
     * @param [int] $destination
     * @param [int] $weight
     * @param [string] $courier
     * @return void
     */
    public function getInternationalCost($origin, $destination, $weight, $courier)
    {
        return $this->requestHeader()->post(self::$url . '/v2/internationalCost', [
            "origin"          => $origin,
            "destination"     => $destination,
            "weight"          => $weight,
            "courier"         => $courier
        ]);
    }

    /**
     * Method "currency" digunakan untuk mendapatkan informasi nilai tukar rupiah terhadap US dollar.
     */
    public function getCurrency()
    {
        return $this->requestHeader()->post(self::$url . '/currency');
    }

    /**
     * Method “waybill” untuk digunakan melacak/mengetahui status pengiriman berdasarkan nomor resi.
     *
     * @param [string] $noResi
     * @param [string] $courier
     * @return void
     */
    public function getTracking($noResi, $courier)
    {
        return $this->requestHeader()->post(self::$url . '/waybill', [
            "waybill" => $noResi,
            "courier" => $courier
        ]);
    }
}
