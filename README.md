# This is my package laravel-rajaongkir

<p align="center">
<img src="https://img.shields.io/static/v1?label=Language&message=PHP&color=green">
<img src="https://img.shields.io/static/v1?label=Version&message=8.0&color=blue">
<img src="https://img.shields.io/static/v1?label=Framework&message=Laravel&color=red">
</p>

---
This repo can be used to scaffold a Laravel package. Follow these steps to get started:

1. Press the "Use template" button at the top of this repo to create a new repo with the contents of this laravel-rajaongkir
2. Run "php ./configure.php" to run a script that will replace all placeholders throughout all the files
3. Remove this block of text.
4. Have fun creating your package.
5. If you need help creating a package, consider picking up our <a href="https://laravelpackage.training">Laravel Package Training</a> video course.
---

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

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

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
