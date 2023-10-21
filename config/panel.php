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

    'modulelinks' => [
        [
            'icon' => 'bi bi-people',
            'name' => 'Parties',
            'route' => null,
            'position' => 4,
            'access' => 'admin|data-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Suppliers',
                    'route' => 'suppliers.index',
                    'position' => 1,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Customers',
                    'route' => 'customers.index',
                    'position' => 2,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Addresses',
                    'route' => 'addresses.index',
                    'position' => 3,
                    'access' => 'admin|data-manager',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-diagram-3',
            'name' => 'Datasets',
            'route' => null,
            'position' => 5,
            'access' => 'admin|data-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Locations',
                    'route' => 'locations.index',
                    'position' => 1,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Units',
                    'route' => 'units.index',
                    'position' => 2,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Categories',
                    'route' => 'categories.index',
                    'position' => 3,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Taxations',
                    'route' => 'taxations.index',
                    'position' => 4,
                    'access' => 'admin|data-manager',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-shield-check',
            'name' => 'System Controls',
            'route' => null,
            'position' => 6,
            'access' => 'admin',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Users',
                    'route' => 'users.index',
                    'position' => 1,
                    'access' => 'admin',
                ],
            ],
        ],

    ],

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
            'route' => 'about-us',
            'access' => '',
        ],
        3 => [
            'icon' => 'bi bi-',
            'name' => 'Terms & Conditions',
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