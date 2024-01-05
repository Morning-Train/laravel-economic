<?php

use Illuminate\Support\Facades\Http;
use Morningtrain\Economic\Resources\Customer;
use Morningtrain\LaravelEconomic\RequestLogger\RequestLogger;
use Morningtrain\LaravelEconomic\Tests\TestClasses\TestRequestLogger;

beforeEach(function () {
    $this->instance(RequestLogger::class, new TestRequestLogger());
});

it('calls request logger before and after request', function () {
    $logger = app(RequestLogger::class);

    Http::fake([
        'https://restapi.e-conomic.com/customers*' => Http::response([]),
    ]);

    Customer::where('name', 'Morningtrain')->first();

    expect($logger->onRequestCalledTimes)->toBe(1);
    expect($logger->onResponseCalledTimes)->toBe(1);
});
