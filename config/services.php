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
        'client_id' => '384202639541062',  //client face của bạn
        'client_secret' => '8315d2db5c49e1888ac71c9a4ebd144e',  //client app service face của bạn
        'redirect' => 'http://localhost:84/EcommerceLaravel/login/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '623333924154-f4fpcibm1342dr9iqd407kikg55gurck.apps.googleusercontent.com',
        'client_secret' => 'u2tY0yprS9wsfMGlhnVgXv3W',
        'redirect' => 'http://localhost:84/EcommerceLaravel/google/callback'
    ],


];
