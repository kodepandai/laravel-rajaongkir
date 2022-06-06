<?php

namespace Kodepandai\LaravelRajaOngkir;

use Illuminate\Support\Facades\Http;

class RajaOngkir
{
    public const BASE_URL = [
        'starter' => 'https://api.rajaongkir.com/starter',
        'basic' => 'https://api.rajaongkir.com/basic',
        'pro' => 'https://pro.rajaongkir.com/api',
    ];

    protected string $url;

    protected array $config = [];

    public function __construct()
    {
        $this->config = config('rajaongkir');

        $this->url = self::BASE_URL[$this->config['ACCOUNT_TYPE']];

        return $this;
    }

    protected function apiCall(string $urlPath, array $payload = [], string $method = 'GET')
    {
        $url = $this->url . '/' . ltrim($urlPath, '/');

        return Http::withHeaders([
            'key' => $this->config['API_KEY'],
            'content-type' => 'application/x-www-form-urlencoded',
        ])->{strtolower($method)}($url, $payload);
    }

    /**
     * Method "province" digunakan untuk mendapatkan daftar propinsi yang ada di Indonesia.
     */
    public function getProvince(): mixed
    {
        return $this->apiCall('/province');
    }

    /**
     * Method "city" digunakan untuk mendapatkan daftar kota/kabupaten yang ada di Indonesia.
     */
    public function getCity(): mixed
    {
        return $this->apiCall('/city');
    }

    /**
     * Method "subdistrict" digunakan untuk mendapatkan daftar kecamatan yang ada di Indonesia.
     */
    public function getSubdistrict(): mixed
    {
        return $this->apiCall('/subdistrict');
    }

    /**
     * Method “cost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim) dari dan ke kecamatan tujuan tertentu dengan berat tertentu.
     */
    public function getCost(int $origin, string $originType, int $destination, string $destinationType, int $weight, string $courier): mixed
    {
        return $this->apiCall('/cost', [
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
    public function getInternationalOrigin(int $idCity, int $province): mixed
    {
        return $this->apiCall('/v2/internationalOrigin', [
            "id" => $idCity,
            "province" => $province,
        ]);
    }

    /**
     * Method "getInternationalCountry" menampilkan semua negara pengiriman internasional.
     */
    public function getInternationalCountry(): mixed
    {
        return $this->apiCall('/v2/internationalDestination');
    }

    /**
     * Method "internationalDestination" digunakan untuk mendapatkan daftar/nama negara tujuan pengiriman internasional.
     */
    public function getInternationalDestination(int $idCountry): mixed
    {
        return $this->apiCall('/v2/internationalDestination', [
            "id" => $idCountry,
        ]);
    }

    /**
     * Method “internationalCost” digunakan untuk mengetahui tarif pengiriman (ongkos kirim)
     * internasional dari kota-kota di Indonesia ke negara tujuan di seluruh dunia.
     */
    public function getInternationalCost(int $origin, int $destination, int $weight, string $courier): mixed
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
    public function getCurrency(): mixed
    {
        return $this->apiCall('/currency');
    }

    /**
     * Method "getTracking" untuk digunakan melacak/mengetahui status pengiriman berdasarkan nomor resi.
     */
    public function getTracking(string $noResi, string $courier): mixed
    {
        return $this->apiCall('/waybill', [
            "waybill" => $noResi,
            "courier" => $courier,
        ], 'POST');
    }
}
