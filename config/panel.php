<?php

return [

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
            'name' => 'People',
            'route' => null,
            'position' => 2,
            'access' => 'user-role',
            'child' => [
                [
                    'icon' => 'bi bi-person',
                    'name' => 'Users',
                    'route' => 'users.index',
                    'position' => 2,
                    'access' => 'user-role',
                ],
            ],
        ],
        
        [
            'icon' => 'bi bi-diagram-3',
            'name' => 'Datasets',
            'route' => null,
            'position' => 3,
            'access' => 'user-role',
            'child' => [
                [
                    'icon' => 'bi bi-arrow-right-short',
                    'name' => 'Material',
                    'route' => 'materials.index',
                    'position' => 1,
                    'access' => 'user-role',
                ],
            ],
        ],

    ],

    'applinks' => [],

    'userlinks' => [
        1 => [
            'icon' => 'bi bi-',
            'name' => 'Preferences',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
        2 => [
            'icon' => 'bi bi-',
            'name' => 'Support',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
        3 => [
            'icon' => 'bi bi-',
            'name' => 'Tutorials',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
        4 => [
            'icon' => 'bi bi-',
            'name' => 'Help',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
        5 => [
            'icon' => 'bi bi-',
            'name' => 'Feedback',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
        6 => [
            'icon' => 'bi bi-',
            'name' => 'Report a Bug',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
    ],

    'defaultinks' => [
        1 => [
            'icon' => 'bi bi-person-circle',
            'name' => 'My Profile',
            'route' => 'profiles.index',
            'access' => 'user-role',
        ],
        2 => [
            'icon' => 'bi bi-',
            'name' => 'About Us',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
        3 => [
            'icon' => 'bi bi-',
            'name' => 'Terms & Conditions',
            // 'route' => 'web.settings',
            'route' => 'users.index',
            'access' => 'user-role',
        ],
    ],
];