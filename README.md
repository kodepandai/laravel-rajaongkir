*Baca ini dalam bahasa: [Indonesia](README-ID.md)*
# Laravel RajaOngkir API Wrapper

<p align="center">
<img src="https://img.shields.io/static/v1?label=PHP&message=8.0&color=green">
<img src="https://img.shields.io/static/v1?label=Version&message=2.0.0&color=blue">
<img src="https://img.shields.io/static/v1?label=Framework&message=Laravel&color=red">
</p>

## Installation

You can install the package via composer:

```bash
composer require kodepintar/laravel-rajaongkir
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="rajaongkir-config"
```

This is the contents of the published config file:

```php
return [
    'API_KEY' => env('RAJAONGKIR_KEY', 'somerandomstring'),
    'ACCOUNT_TYPE' => env('RAJAONGKIR_TYPE', 'starter')
];
```

## Usage

```php
use Kodepintar\LaravelRajaOngkir\Facades\RajaOngkir;

return RajaOngkir::getProvince();
```

## Credits

- [Tio](https://github.com/sangvictim)
- [Akhmad Salafudin](https://github.com/axmad386)

This repo used template from [spatie](https://github.com/spatie/package-skeleton-laravel)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
