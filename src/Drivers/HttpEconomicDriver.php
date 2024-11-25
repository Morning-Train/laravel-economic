<?php

namespace Morningtrain\LaravelEconomic\Drivers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Morningtrain\Economic\Classes\EconomicResponse;
use Morningtrain\Economic\Interfaces\EconomicDriver;

class HttpEconomicDriver implements EconomicDriver
{
    public function get(string $url, array $queryArgs = []): EconomicResponse
    {
        $response = Http::economic()->get($url, $queryArgs);

        return new EconomicResponse($response->status(), $response->json());
    }

    public function post(string $url, array $body = [], ?string $idempotencyKey = null): EconomicResponse
    {
        $response = Http::economic()
            ->when(
                $idempotencyKey !== null,
                fn (PendingRequest $request) => $request->withHeader('Idempotency-Key', $idempotencyKey)
            )
            ->post($url, $body);

        return new EconomicResponse($response->status(), $response->json());
    }

    public function put(string $url, array $body = [], ?string $idempotencyKey = null): EconomicResponse
    {
        $response = Http::economic()
            ->when(
                $idempotencyKey !== null,
                fn (PendingRequest $request) => $request->withHeader('Idempotency-Key', $idempotencyKey)
            )
            ->put($url, $body);

        return new EconomicResponse($response->status(), $response->json());
    }

    public function delete(string $url): EconomicResponse
    {
        $response = Http::economic()->delete($url);

        return new EconomicResponse($response->status(), $response->json());
    }

    public function patch(string $url): EconomicResponse
    {
        $response = Http::economic()->patch($url);

        return new EconomicResponse($response->status(), $response->json());
    }
}
