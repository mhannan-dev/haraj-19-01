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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '2650095211790400',
        'client_secret' => '05469bed1f42a63402919913f95a0f53',
        'redirect' => 'https://haraj.hannan.appdevs.net/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '874978806897-bkr7at610eusfho813pl7gu90ana1dnf.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://haraj.hannan.appdevs.net/login/google/callback',
    ],
    'stripe' => [
        'secret' => env('STRIPE_SECRET'),
   ],
];
