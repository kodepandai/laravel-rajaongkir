<?php
// config for Kodepintar/LaravelRajaongkir
return  [
    /**
     * api key yang di dapat dari akun raja ongkir
     */
    'API_KEY' => env('RAJAONGKIR_KEY', 'somerandomstring'),

    /**
     * tipe akun untuk menentukan api url
     * starter, basic, pro
     */
    'ACCOUNT_TYPE' => env('RAJAONGKIR_TYPE', 'starter')
];
