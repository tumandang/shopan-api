<?php

return [
    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'login',
        'logout',
        'profile'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['https:/shoppyjapan.vercel.app/'],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
];