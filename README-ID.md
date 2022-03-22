*Baca ini dalam bahasa: [Inggris](README.md)*

# Laravel RajaOngkir API Wrapper

<p align="center">
<img src="https://img.shields.io/static/v1?label=PHP&message=8.0&color=green">
<img src="https://img.shields.io/static/v1?label=Version&message=3.0.0&color=blue">
<img src="https://img.shields.io/static/v1?label=Framework&message=Laravel&color=red">
</p>

## Penginstalan

Anda dapat menginstall package ini melalui composer:

```bash
composer require kodepandai/laravel-rajaongkir
```

Anda dapat mempublish file config dengan cara:
```bash
php artisan vendor:publish --tag="rajaongkir-config"
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
use Kodepandai\LaravelRajaOngkir\Facades\RajaOngkir;

return RajaOngkir::getProvince();

```

## Kredit

- [Tio](https://github.com/sangvictim)
- [Akhmad Salafudin](https://github.com/axmad386)

Repositori ini menggunakan template dari [spatie](https://github.com/spatie/package-skeleton-laravel)

## Lisensi

Lisensi MIT (MIT). Harap lihat [File Lisensi](LICENSE.md) Untuk informasi lebih lanjut.
