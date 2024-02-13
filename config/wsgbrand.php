<?php

return [

    // Base URL for the WsgBrand application
    'url' => env('WSGB_BASE_URL'),

    // API Token for secure access
    'token' => '1234567890',

    // Base URL for API requests,
    'base_url' => env('WSGB_BASE_URL'),

    // API Endpoints for synchronization operations
    'api' => [
        'sync' => [
            'sos' => '/api/sync/sos',
            'parties' => '/api/sync/parties',
        ],
    ],

];
