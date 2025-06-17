# This is my package laravel-e-conomic

[![Latest Version on Packagist](https://img.shields.io/packagist/v/morning-train/laravel-e-conomic.svg?style=flat-square)](https://packagist.org/packages/morning-train/laravel-e-conomic)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/morning-train/laravel-e-conomic/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/morning-train/laravel-e-conomic/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/morning-train/laravel-e-conomic/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/morning-train/laravel-e-conomic/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/morning-train/laravel-e-conomic.svg?style=flat-square)](https://packagist.org/packages/morning-train/laravel-e-conomic)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require morningtrain/laravel-economic
```
### Configuring the package

You can publish the config file with:

```bash
php artisan vendor:publish --tag="e-conomic-config"
```

This is the contents of the published config file:

```php
<?php

return [
    'app_secret_token' => env('ECONOMIC_APP_SECRET_TOKEN'),
    'agreement_grant_token' => env('ECONOMIC_AGREEMENT_GRANT_TOKEN'),

    /*
     * This class handles actions on request and response to Economic.
     */
    'request_logger' => \Morningtrain\LaravelEconomic\RequestLogger\VoidRequestLogger::class,
];

```

## Usage

### Creating your own request logger

A request logger is any class that implements `\Morningtrain\LaravelEconomic\RequestLogger\RequestLogger`. Here's what that interface looks like.

```php
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Client\Request;
use Psr\Http\Message\ResponseInterface;

interface RequestLogger
{
    public function onRequest(Request $request);

    public function onResponse(Response $response): ResponseInterface;
}

```

After creating your own `RequestLogger` you must register it in the `request_logger` in the `e-conomic` config file.

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
