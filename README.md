# This is my package laravel-e-conomic

[![Latest Version on Packagist](https://img.shields.io/packagist/v/morning-train/laravel-e-conomic.svg?style=flat-square)](https://packagist.org/packages/morning-train/laravel-e-conomic)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/morning-train/laravel-e-conomic/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/morning-train/laravel-e-conomic/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/morning-train/laravel-e-conomic/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/morning-train/laravel-e-conomic/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/morning-train/laravel-e-conomic.svg?style=flat-square)](https://packagist.org/packages/morning-train/laravel-e-conomic)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require morning-train/laravel-e-conomic
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-e-conomic-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-e-conomic-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-e-conomic-views"
```

## Usage

```php
$laravelEConomic = new MorningTrain\LaravelEConomic();
echo $laravelEConomic->echoPhrase('Hello, MorningTrain!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Simon Jønsson](https://github.com/Morning-Train)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---

<div align="center">
Developed by <br>
</div>
<br>
<div align="center">
<a href="https://morningtrain.dk" target="_blank">
<img src="https://morningtrain.dk/wp-content/themes/mtt-wordpress-theme/assets/img/logo-only-text.svg" width="200" alt="Morningtrain logo">
</a>
</div>
