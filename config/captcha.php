<?php

return [
    'secret' => env('NOCAPTCHA_SECRET'),
    'sitekey' => env('NOCAPTCHA_SITEKEY'),

    'v3_site_key' => env('NOCAPTCHA_V3_SITEKEY'),
    'v3_secret' => env('NOCAPTCHA_V3_SECRET'),
    'v3' => [
        'min_score' => 0.5, // Минимальный допустимый балл
    ],

    'options' => [
        'timeout' => 30,
    ],
];
