<?php

return [
    'app_secret_token' => env('ECONOMIC_APP_SECRET_TOKEN'),
    'agreement_grant_token' => env('ECONOMIC_AGREEMENT_GRANT_TOKEN'),

    /*
     * This class handles actions on request and response to Economic.
     */
    'request_logger' => \Morningtrain\LaravelEconomic\RequestLogger\VoidRequestLogger::class,

    /*
     * The timeout in seconds for the request to Economic.
     */
    'timeout_seconds' => env('ECONOMIC_TIMEOUT_SECONDS', 30),
];
