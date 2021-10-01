# This is my package laravel-rajaongkir

<p align="center">
<img src="https://img.shields.io/static/v1?label=Language&message=PHP&color=green">
<img src="https://img.shields.io/static/v1?label=Version&message=8.0&color=blue">
<img src="https://img.shields.io/static/v1?label=Framework&message=Laravel&color=red">
</p>

## Installation

You can install the package via composer:

```bash
composer require kodepintar/laravel-rajaongkir
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Kodepintar\LaravelRajaongkir\LaravelRajaongkirServiceProvider" --tag="laravel-rajaongkir-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Kodepintar\LaravelRajaongkir\LaravelRajaongkirServiceProvider" --tag="laravel-rajaongkir-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel-rajaongkir = new Kodepintar\LaravelRajaongkir();
echo $laravel-rajaongkir->echoPhrase('Hello, Kodepintar!');
```

## Credits

- [Tio](https://github.com/sangvictim)
- [Akhmad Salafudin](https://github.com/axmad386)

this repo used template from spatie

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
