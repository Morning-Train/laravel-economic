<?php

namespace Morningtrain\LaravelEconomic;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use Morningtrain\Economic\Services\EconomicApiService;
use Morningtrain\LaravelEconomic\Drivers\HttpEconomicDriver;
use Morningtrain\LaravelEconomic\RequestLogger\RequestLogger;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelEconomicServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        $this->app->singleton(RequestLogger::class, config('e-conomic.request_logger'));

        Http::macro('economic', function (): PendingRequest {
            /** @var RequestLogger $logger */
            $logger = app(RequestLogger::class);

            if (! is_subclass_of($logger, RequestLogger::class)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'The request logger must implement the %s interface',
                        RequestLogger::class
                    )
                );
            }

            /** @var \Illuminate\Http\Client\Factory $this */
            return $this
                ->withHeaders([
                    'X-AppSecretToken' => config('e-conomic.app_secret_token'),
                    'X-AgreementGrantToken' => config('e-conomic.agreement_grant_token'),
                    'Content-Type' => 'application/json',
                ])
                ->beforeSending(
                    fn (Request $request) => $logger->onRequest($request)
                )
                ->withResponseMiddleware(
                    fn (Response $response) => $logger->onResponse($response)
                )
                ->throw();
        });

        EconomicApiService::setDriver(new HttpEconomicDriver());
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-e-conomic')
            ->hasConfigFile();
    }
}
