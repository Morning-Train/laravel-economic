<?php

namespace Morningtrain\LaravelEconomic\Tests\TestClasses;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Client\Request;
use Morningtrain\LaravelEconomic\RequestLogger\RequestLogger;
use Psr\Http\Message\ResponseInterface;

class TestRequestLogger implements RequestLogger
{
    public int $onRequestCalledTimes = 0;

    public int $onResponseCalledTimes = 0;

    public function onRequest(Request $request)
    {
        $this->onRequestCalledTimes++;
    }

    public function onResponse(Response $response): ResponseInterface
    {
        $this->onResponseCalledTimes++;

        return $response;
    }
}
