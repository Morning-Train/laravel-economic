<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use MorningTrain\Economic\Resources\Customer;

it('adds headers from env', function () {
    Http::fake([
        '*' => Http::response([]),
    ]);

    Customer::first();

    Http::assertSent(function (Request $request) {
        return $request->hasHeader('X-AppSecretToken', 'SECRET_TOKEN')
            && $request->hasHeader('X-AgreementGrantToken', 'GRANT_TOKEN')
            && $request->hasHeader('Content-Type');
    });
});

it('sends request with filters', function () {
    Http::fake([
        'https://restapi.e-conomic.com/customers*' => Http::response([]),
    ]);

    Customer::where('name', 'Morningtrain')->first();

    Http::assertSent(function (Request $request) {
        return $request->data() === [
                'pageSize' => 1,
                'skipPages' => 0,
                'filter' => 'name$eq:Morningtrain',
            ];
    });
});
