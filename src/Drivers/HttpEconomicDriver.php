<?php

namespace MorningTrain\LaravelEConomic\Drivers;

use Illuminate\Support\Facades\Http;
use MorningTrain\Economic\Classes\EconomicResponse;
use MorningTrain\Economic\Interfaces\EconomicDriver;

class HttpEconomicDriver implements EconomicDriver
{
    public function get(string $url, array $queryArgs = []): EconomicResponse
    {
        $response = Http::economic()->get($url, $queryArgs);

        return new EconomicResponse($response->status(), $response->json());
    }

    public function post(string $url, array $body = []): EconomicResponse
    {
        $response = Http::economic()->post($url, $body);

        return new EconomicResponse($response->status(), $response->json());
    }

    public function put(string $url, array $body = []): EconomicResponse
    {
        $response = Http::economic()->put($url, $body);

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
