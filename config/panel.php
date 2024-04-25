<?php

return [

    'owner_email' => 'admin_alert@fpaipl.in', // for owner notification

    // For Migration Run
    // for stock
    // 'auto-create-stock' => true, 
    // for other migrations
    'auto-create-stock' => false,
    
    // 'icon' => 'plus-lg'
    'create-actions' => [
        [ 'title' => 'Order Documents' ],
        [ 'route' => 'pos.create', 'abbr' => 'PO', 'name' => 'Purchase Order', 'access' => 'manager|order-manager' ],
        [ 'route' => 'sos.create', 'abbr' => 'SO', 'name' => 'Sale Order', 'access' => 'manager|order-manager' ],
        [ 'route' => 'prs.create', 'abbr' => 'PR', 'name' => 'Purchase Return Order', 'access' => 'manager|order-manager' ],
        [ 'route' => 'srs.create', 'abbr' => 'SR', 'name' => 'Sale Return Order', 'access' => 'manager|order-manager' ],
        [ 'divider' => true ],
        [ 'title' => 'Movement Documents' ],
        [ 'route' => 'inwards.create', 'abbr' => 'IN', 'name' => 'Stock Inward Note', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'outwards.create', 'abbr' => 'ON', 'name' => 'Stock Outward Note', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'inward-returns.create', 'abbr' => 'IRN', 'name' => 'Stock Inward Return Note', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'outward-returns.create', 'abbr' => 'ORN', 'name' => 'Stock Outward Return Note', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'bulk.inwards.create', 'abbr' => 'IN+', 'name' => 'Bulk Inward Notes', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'route' => 'bulk.outwards.create', 'abbr' => 'ON+', 'name' => 'Bulk Outward Notes', 'access' => 'manager|store-manager|qc-manager' ],
        [ 'divider' => true ],
        [ 'title' => 'Billing Documents' ],
        [ 'route' => 'purchases.create', 'abbr' => 'PUR', 'name' => 'Purchase Invoice', 'access' => 'manager|account-manager' ],
        [ 'route' => 'sales.create', 'abbr' => 'SAL', 'name' => 'Sale Invoice (GST)', 'access' => 'manager|account-manager' ],
        // [ 'route' => 'sales.create', 'abbr' => 'PAY', 'name' => 'Make Ledger Payment', 'access' => 'manager|account-manager' ],
        // [ 'route' => 'sales.create', 'abbr' => 'REC', 'name' => 'Book Ledger Receipt', 'access' => 'manager|account-manager' ],
        // [ 'divider' => true ],
        // [ 'title' => 'Accounting Documents' ],
        // [ 'route' => 'sales.create', 'abbr' => 'EXP', 'name' => 'Add New Expenses', 'access' => 'manager|account-manager' ],
        // [ 'route' => 'sales.create', 'abbr' => 'INC', 'name' => 'Add New Income', 'access' => 'manager|account-manager' ],
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
                'quantity' => 1, // i.e. 100%
                // 'quantity' => 0.1, // i.e. 10%
            ],
            'so' => [
                'rate' => 0, // i.e. No Tolerance
                'expiry' => 0.1, // i.e. 10%
                'quantity' => 1, // i.e. 100%
                // 'quantity' => 0.1, // i.e. 10%
            ],
            'bill' => [
                'adjustment' => 10, // i.e. 1%
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
        'po' => 365, // days
        'so' => 365, // days
        'por' => 365, // days
        'sor' => 365, // days
        'inward' => 365, // days
        'outward' => 365, // days
        'purchase' => 365, // days
        'sale' => 365, // days
        'debitnote' => 365, // days
        'creditnote' => 365, // days
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
            'id' => 'menu-dashboard',
            'icon' => 'bi bi-speedometer2',
            'name' => 'Dashboard',
            'route' => 'stocky.dashboard', // default 'panel.dashboard'
            'position' => 1,
            'access' => 'user',
            'child' => [],
        ],
        [
            'id' => 'menu-reportings',
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
            'id' => 'menu-orders',
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
            'id' => 'menu-store',
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
            'id' => 'menu-bills',
            'icon' => 'bi bi-cash-stack',
            'name' => 'Party Bills',
            'route' => null,
            'position' => 3,
            'access' => 'manager|account-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Purchase Bills',
                    'route' => 'purchases.index',
                    'position' => 1,
                    'access' => 'manager|account-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Sales Bills',
                    'route' => 'sales.index',
                    'position' => 2,
                    'access' => 'manager|account-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Debit Notes',
                    'route' => 'debitnotes.index',
                    'position' => 3,
                    'access' => 'manager|account-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Credit Notes',
                    'route' => 'creditnotes.index',
                    'position' => 4,
                    'access' => 'manager|account-manager',
                ],
            ],
        ],
        [
            'id' => 'menu-accounts',
            'icon' => 'bi bi-cash-stack',
            'name' => 'Accounts',
            'route' => null,
            'position' => 3,
            'access' => 'manager|account-manager',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Groups',
                    'route' => 'groups.index',
                    'position' => 1,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Party Ledgers',
                    'route' => 'ledgers.index',
                    'position' => 3,
                    'access' => 'manager|account-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Transactions',
                    'route' => 'transactions.index',
                    'position' => 4,
                    'access' => 'manager|account-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Journal Entries',
                    'route' => 'journals.index',
                    'position' => 4,
                    'access' => 'manager|account-manager',
                ],
            ],
        ],
        [
            'id' => 'menu-godowns',
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
            'id' => 'menu-parties',
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
            'id' => 'menu-materials',
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
            'id' => 'menu-general',
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
                    'position' => 1,
                    'access' => 'admin|data-manager',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Taxes',
                    'route' => 'taxes.index',
                    'position' => 2,
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
            'id' => 'menu-system',
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
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Notifications',
                    'route' => 'notifications.index',
                    'position' => 2,
                    'access' => 'admin',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Activity Logs',
                    'route' => 'activitylogs.index',
                    'position' => 3,
                    'access' => 'admin',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Queued Jobs',
                    'route' => 'jobs.index',
                    'position' => 3,
                    'access' => 'admin',
                ],
                [
                    'icon' => 'bi bi-arrow-right-short text-white',
                    'name' => 'Failed Jobs',
                    'route' => 'failedjobs.index',
                    'position' => 4,
                    'access' => 'admin',
                ],
            ],
        ],

    ],

    'applinks' => [
        [
            'id' => 'menu-settings',
            'icon' => 'bi bi bi-chat-left-text-fill',
            'name' => 'Open Chatbox',
            'route' => 'panel.chatbox.index',
            'position' => 1,
            'access' => 'admin|owner|manager',
            'child' => [],
        ],
        [
            'id' => 'menu-settings',
            'icon' => 'bi bi bi-gear-fill',
            'name' => 'App Setting',
            'route' => 'panel.settings.index',
            'position' => 1,
            'access' => 'admin|owner|manager',
            'child' => [],
        ],
    ],

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
