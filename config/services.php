<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '724088211287-nucoodim4a1mp5507eucrela077pt763.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/google/signup',
    ],
    'facebook' => [
        'client_id' => '830884295225570',
        'client_secret' => '629f61b4df06fdef54ca386107fa529f',
        'redirect' => 'http://localhost:8000/facebook/signup',
    ],

];
