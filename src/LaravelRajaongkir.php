<?php

namespace Kodepintar\LaravelRajaongkir;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class LaravelRajaongkir
{
    protected $BASE_URL = [
        'starter' => 'https://api.rajaongkir.com/starter',
        'basic' => 'https://api.rajaongkir.com/basic',
        'pro' => 'https://pro.rajaongkir.com/api',
    ];

    protected $url = null;

    public function __construct()
    {
        $accountType = config('rajaongkir.ACCOUNT_TYPE', env('RAJAONGKIR_TYPE'));

        $this->url = $this->BASE_URL[$accountType];

        return $this;
    }

    protected function apiCall(string $urlPath, array $payload = [], string $method = 'GET')
    {
        $url = $this->url . '/' . ltrim($urlPath, '/');

        return Http::withHeaders([
            'key' => config('rajaongkir.API_KEY', env('RAJAONGKIR_KEY')),
            'content-type' => 'application/x-www-form-urlencoded',
        ])->{strtolower($method)}($url, $payload);
    }

    /**
     * Method "province" digunakan untuk mendapatkan daftar propinsi yang ada di Indonesia.
     */
    public function getProvince()
    {
        return $this->apiCall('/province');
    }

    /**
     * Method "city" digunakan untuk mendapatkan daftar kota/kabupaten yang ada di Indonesia.
     */
    public function getCity()
    {
        return $this->apiCall('/city');
    }

    /**
     * Method "subdistrict" digunakan untuk mendapatkan daftar kecamatan yang ada di Indonesia.
     */
    public function getSubdistrict()
    {
        return $this->apiCall('/subdistrict');
    }

    /**
     * Method “cost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim) dari dan ke kecamatan tujuan tertentu dengan berat tertentu.
     */
    public function getCost(int $origin, string $originType, int $destination, string $destinationType, int $weight, string $courier)
    {
        return $this->apiCall('/subdistrict', [
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
     */
    public function getInternationalOrigin($internationalOrigin, $province)
    {
        return $this->apiCall('/v2/internationalOrigin', [
            "internationalOrigin" => $internationalOrigin,
            "province" => $province,
        ]);
    }

    /**
     * Method "internationalDestination" digunakan untuk mendapatkan daftar/nama negara tujuan pengiriman internasional.
     */
    public function getInternationalDestination($idCountry)
    {
        return $this->apiCall('/v2/internationalDestination', [
            "id" => $idCountry,
        ]);
    }

    /**
     * Method “internationalCost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim)
     * internasional dari kota-kota di Indonesia ke negara tujuan di seluruh dunia.
     */
    public function getInternationalCost(int $origin, int $destination, int $weight, string $courier)
    {
        return $this->apiCall('/v2/internationalCost', [
            "origin" => $origin,
            "destination" => $destination,
            "weight" => $weight,
            "courier" => $courier,
        ], 'POST');
    }

    /**
     * Method "currency" digunakan untuk mendapatkan informasi nilai tukar rupiah terhadap US dollar.
     */
    public function getCurrency()
    {
        return $this->apiCall('/currency');
    }

    /**
     * Method “waybill” untuk digunakan melacak/mengetahui status pengiriman berdasarkan nomor resi.
     */
    public function getTracking($noResi, $courier)
    {
        return $this->apiCall('/waybill', [
            "waybill" => $noResi,
            "courier" => $courier,
        ], 'POST');
    }
}
