<?php
// config for Kodepintar/LaravelRajaongkir
return  [
    /**
     * api key yang di dapat dari akun raja ongkir
     */
    'API_KEY' => env('APIKEY_RAJAONGKIR', 'SomeRandomString'),

    /**
     * tipe akun untuk menentukan api url
     * Starter, Basic, Pro
     */
    'TIPE_AKUN' => env('TIPE_AKUN_RAJAONGKIR', 'starter')
];
