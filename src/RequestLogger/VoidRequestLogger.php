<?php

namespace Morningtrain\LaravelEconomic\RequestLogger;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Client\Request;
use Psr\Http\Message\ResponseInterface;

class VoidRequestLogger implements RequestLogger
{
    public function onRequest(Request $request)
    {
        //
    }

    public function onResponse(Response $response): ResponseInterface
    {
        return $response;
    }
}
