*Baca ini dalam bahasa: [Inggris](README.md)*

# laravel-rajaongkir

<p align="center">
<img src="https://img.shields.io/static/v1?label=Language&message=PHP&color=green">
<img src="https://img.shields.io/static/v1?label=Version&message=8.0&color=blue">
<img src="https://img.shields.io/static/v1?label=Framework&message=Laravel&color=red">
</p>

## Penginstalan

Anda dapat menginstall package ini melalui composer:

```bash
composer require kodepintar/laravel-rajaongkir
```

Anda dapat mempublish dan menjalankan migrasi dengan cara:

```bash
php artisan vendor:publish --provider="Kodepintar\LaravelRajaongkir\LaravelRajaongkirServiceProvider" --tag="laravel-rajaongkir-migrations"
php artisan migrate
```

Anda dapat mempublish file config dengan cara:
```bash
php artisan vendor:publish --provider="Kodepintar\LaravelRajaongkir\LaravelRajaongkirServiceProvider" --tag="laravel-rajaongkir-config"
```

Ini adalah konten dari file config yang telah dipublish:

```php
return [
    'API_KEY' => env('RAJAONGKIR_KEY', 'somerandomstring'),
    'ACCOUNT_TYPE' => env('RAJAONGKIR_TYPE', 'starter')
];
```

## Penggunaan

```php
use Kodepintar\LaravelRajaongkir\LaravelRajaongkir as Ongkir;

$data = new Ongkir();
$data = $data->getProvince();
return $data;
```

## Kredit

- [Tio](https://github.com/sangvictim)
- [Akhmad Salafudin](https://github.com/axmad386)

Repositori ini menggunakan template dari spatie

## Lisensi

Lisensi MIT (MIT). Harap lihat [File Lisensi](LICENSE.md) Untuk informasi lebih lanjut.
