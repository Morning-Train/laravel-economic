<?php

namespace MorningTrain\LaravelEConomic;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use MorningTrain\Economic\Services\EconomicApiService;
use MorningTrain\LaravelEConomic\Drivers\HttpEconomicDriver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelEconomicServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        Http::macro('economic', function (): PendingRequest {
            /** @var \Illuminate\Http\Client\Factory $this */
            return $this
                ->withHeaders([
                    'X-AppSecretToken' => config('e-conomic.app_secret_token'),
                    'X-AgreementGrantToken' => config('e-conomic.agreement_grant_token'),
                    'Content-Type' => 'application/json',
                ])
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
