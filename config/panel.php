<?php

return [

    // For Migration Run
    // for stock
    // 'auto-create-stock' => true, 
    // for other migrations
    'auto-create-stock' => false,
    
    'create-actions' => [
        [ 'route' => 'pos.create', 'name' => 'New PO', 'access' => 'manager|order-manager' ],
        [ 'route' => 'prs.create', 'name' => 'New PR', 'access' => 'manager|order-manager' ],
        [ 'route' => 'sos.create', 'name' => 'New SO', 'access' => 'manager|order-manager' ],
        [ 'route' => 'srs.create', 'name' => 'New SR', 'access' => 'manager|order-manager' ],
        [ 'route' => 'inwards.create', 'name' => 'New Inward', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'inward-returns.create', 'name' => 'New Inward Return', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'outwards.create', 'name' => 'New Outward', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'outward-returns.create', 'name' => 'New Outward Return', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'purchases.create', 'name' => 'New Purchase', 'access' => 'manager|account-manager' ],
        [ 'route' => 'sales.create', 'name' => 'New Sale', 'access' => 'manager|account-manager' ],
    ],

    'fabric-types' => [
        'fabric' => 'Fabric',
        'accessories' => 'Accessories',
        'trims' => 'Trims',
        'packaging' => 'Packaging',
        'other' => 'Other',
    ],

    'tolerance' => [      
        'default' => [
            'po' => [
                'rate' => 0.05, // i.e. 5%
                'expiry' => 0.1, // i.e. 10%
                'quantity' => 0.1, // i.e. 10%
            ],
            'so' => [
                'rate' => 0, // i.e. No Tolerance
                'expiry' => 0.1, // i.e. 10%
                'quantity' => 0.1, // i.e. 10%
            ],
            'bill' => [
                'adjustment' => 0.01, // i.e. 1%
            ]
        ],
        'buffers' => [
            'po' => [
                'rate' => 0,
                'expiry' => 0,
                'quantity' => 0,
            ],
            'so' => [
                'rate' => 0,
                'expiry' => 0,
                'quantity' => 0,
            ],
        ],
    ],

    'archived' => [
        'po' => 30, // days
        'so' => 30, // days
        'por' => 30, // days
        'sor' => 30, // days
        'inward' => 30, // days
        'outward' => 30, // days
        'purchase' => 30, // days
        'sale' => 30, // days
        'debitnote' => 30, // days
        'creditnote' => 30, // days
    ],

    'ageing' => [
        'payables' => 45, // days
        'receivables' => 30, // days
    ],

    'view-only-models' => [
        'App\Models\User',
        'Fpaipl\Stocky\Models\Stock',
        'Fpaipl\Stocky\Models\Location',
    ],

    'filterable-models' => [ 'po', 'so' ],

    'delivery_types' => [
        'free' => 'Free Delivery',
        'self' => 'Self Pickup',
        'paid' => 'Paid Delivery',
    ],

    'assignable-roles' => [
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
        // all staff supervisor -- view only
        [
            'id' => 'supervisor',
            'name' => 'Supervisor',
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

    'godowns' => [
        [
            'id' => 'a',
            'name' => 'Godown A - First Floor',
        ],
        [
            'id' => 'b',
            'name' => 'Godown B - Basement',
        ],
        [
            'id' => 'c',
            'name' => 'Godown C - QC Area',
        ],
        [
            'id' => 'd',
            'name' => 'Godown D - New 1',
        ],
        [
            'id' => 'e',
            'name' => 'Godown E - New 2',
        ],
    ],

    'racks' => 99,

    'default' => [
        'godown' => 'c',
        'rack' => '01',
    ],

    'actionlinks' => [],

    'modulelinks' => [
        [
            'icon' => 'bi bi-speedometer2',
            'name' => 'Dashboard',
            'route' => 'stocky.dashboard', // default 'panel.dashboard'
            'position' => 1,
            'access' => 'user',
            'child' => [],
        ],
        [
            'icon' => 'bi bi bi-stack-overflow',
            'name' => 'Reportings',
            'route' => 'stocky.reportings', // default 'panel.dashboard'
            'position' => 2,
            'access' => 'admin|owner|manager',
            'child' => [],
        ],

        [
            'module' => 'Working Modules',
            'access' => 'order-manager',
            'child' => [],
        ],
        [
            'icon' => 'bi bi-cart4',
            'name' => 'Orders',
            'route' => null,
            'position' => 1,
            'access' => 'manager|order-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Purchase Orders',
                    'route' => 'pos.index',
                    'position' => 1,
                    'access' => 'manager|order-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Purchase Returns',
                    'route' => 'prs.index',
                    'position' => 1,
                    'access' => 'manager|order-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Sale Orders',
                    'route' => 'sos.index',
                    'position' => 2,
                    'access' => 'manager|order-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Sale Returns',
                    'route' => 'srs.index',
                    'position' => 2,
                    'access' => 'manager|order-manager',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-buildings',
            'name' => 'Store',
            'route' => null,
            'position' => 2,
            'access' => 'manager|store-manager|qc-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Inward Notes',
                    'route' => 'inwards.index',
                    'position' => 1,
                    'access' => 'manager|store-manager|qc-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Inward Returns',
                    'route' => 'inward-returns.index',
                    'position' => 1,
                    'access' => 'manager|store-manager|qc-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Outward Notes',
                    'route' => 'outwards.index',
                    'position' => 3,
                    'access' => 'manager|store-manager|qc-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Outward Returns',
                    'route' => 'outward-returns.index',
                    'position' => 3,
                    'access' => 'manager|store-manager|qc-manager',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-cash-stack',
            'name' => 'Accounts',
            'route' => null,
            'position' => 3,
            'access' => 'manager|account-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Purchase Bills',
                    'route' => 'purchases.index',
                    'position' => 3,
                    'access' => 'manager|account-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Sales Bills',
                    'route' => 'sales.index',
                    'position' => 3,
                    'access' => 'manager|account-manager',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-database',
            'name' => 'Godowns',
            'route' => null,
            'position' => 5,
            'access' => 'store-manager|account-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Stocks',
                    'route' => 'stocks.index',
                    'position' => 1,
                    'access' => 'store-manager|account-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Locations',
                    'route' => 'locations.index',
                    'position' => 3,
                    'access' => 'admin|store-manager',
                ],
            ],
        ],
        [
            'module' => 'Database Modules',
            'access' => 'data-manager',
            'child' => [],
        ],

        [
            'icon' => 'bi bi-people',
            'name' => 'Parties',
            'route' => null,
            'position' => 4,
            'access' => 'admin|data-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Employees',
                    'route' => 'employees.index',
                    'position' => 1,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Suppliers',
                    'route' => 'suppliers.index',
                    'position' => 2,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Customers',
                    'route' => 'customers.index',
                    'position' => 3,
                    'access' => 'admin|data-manager',
                ],
            ],
        ],

        [
            'icon' => 'bi bi-flower1',
            'name' => 'Materials',
            'route' => null,
            'position' => 5,
            'access' => 'admin|data-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Categories',
                    'route' => 'categories.index',
                    'position' => 3,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Products',
                    'route' => 'products.index',
                    'position' => 5,
                    'access' => 'admin|data-manager',
                ],
            ],
        ],

        [
            'icon' => 'bi bi-diagram-3',
            'name' => 'General',
            'route' => null,
            'position' => 5,
            'access' => 'admin|data-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Units',
                    'route' => 'units.index',
                    'position' => 2,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Taxes',
                    'route' => 'taxes.index',
                    'position' => 4,
                    'access' => 'admin|data-manager',
                ],
            ],
        ],

        
        [
            'module' => 'Management Modules',
            'access' => 'manager|order-manager|store-manager|account-manager',
            'child' => [],
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

];
