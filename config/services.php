<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => env('GitHub_Client_Id'),
        'client_secret' => env('GitHub_Client_Secret'),
        'redirect' => env('GitHub_Redirect')
    ],
    'google' => [
        'client_id' => env('GP_Client_Id', '714520632718-c5g5bh557o0fc7t045i2tc1havglr67h.apps.googleusercontent.com'),
        'client_secret' => env('GP_Client_Secret', 'iEa7gm7nj01ga5cK2SKq8aWH'),
        'redirect' => env('GP_Redirect', '	https://www.kurier-link.com/callback/google')
    ],
    'twitter' => [
        'client_id' => env('Twitter_Client_Id', 'At2sHFvJ0d5cf8rfVxLcME5xj'),
        'client_secret' => env('Twitter_Client_Secret', '3KTZexdH3if7indiYUus7gKSIvhWOjkYBa47H68wpH8pvQ2oPt'),
        'redirect' => env('Twitter_Redirect', '	https://www.kurier-link.com/callback/twitter/')
    ],
    'microsoft' => [
        'client_id' => env('Microsoft_Client_Id', '74f8f564-9a67-48ab-8ffa-ce8df57ddb96'),
        'client_secret' => env('Microsoft_Client_Secret', 'snnrGIJ3189+{qrzPGWT0]?'),
        'redirect' => env('Microsoft_Redirect', '	https://www.kurier-link.com/callback/microsoft/')
    ],
];
