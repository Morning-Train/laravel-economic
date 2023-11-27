<?php

use Illuminate\Support\Facades\Http;
use MorningTrain\LaravelEConomic\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

uses()->beforeEach(function() {
   Http::preventStrayRequests();
})->in(__DIR__);
