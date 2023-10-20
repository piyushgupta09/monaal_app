<?php

return [

    'roles' => [
        // for administrative purpose only
        [
            'id' => 'admin',
            'name' => 'Admin',
        ],
       // mandatory for all
        [
            'id' => 'user',
            'name' => 'User',
        ],
        // frontend
        [
            'id' => 'owner',
            'name' => 'Owner',
        ],
        [
            'id' => 'customer',
            'name' => 'Customer',
        ],
        [
            'id' => 'supplier',
            'name' => 'Supplier',
        ],
        // all staff manager
        [
            'id' => 'manager',
            'name' => 'Manager',
        ],
        // staff
        [
            'id' => 'order-manager',
            'name' => 'Order Manager',
        ],
        [
            'id' => 'store-manager',
            'name' => 'Store Manager',
        ],
        [
            'id' => 'account-manager',
            'name' => 'Account Manager',
        ],
        [
            'id' => 'data-manager',
            'name' => 'Data Manager',
        ],
        [
            'id' => 'qc-manager',
            'name' => 'QC Manager',
        ],
    ],

    'actionlinks' => [
        1 => [
            'icon' => 'bi bi-speedometer2',
            'name' => 'Dashboard',
            'route' => 'panel.dashboard',
            'access' => 'user-role',
        ],
    ],

    'modulelinks' => [],

    'applinks' => [],

    'userlinks' => [],

    'defaultinks' => [
        1 => [
            'icon' => 'bi bi-person-circle',
            'name' => 'My Profile',
            'route' => 'profiles.index',
            'access' => '',
        ],
        2 => [
            'icon' => 'bi bi-',
            'name' => 'About Us',
            // 'route' => 'web.settings',
            'route' => 'about-us',
            'access' => '',
        ],
        3 => [
            'icon' => 'bi bi-',
            'name' => 'Terms & Conditions',
            // 'route' => 'web.settings',
            'route' => 'terms-and-conditions',
            'access' => '',
        ],
    ],

    'tabs' => [
        'notifications' => [
            'all',
        ]
    ]
];