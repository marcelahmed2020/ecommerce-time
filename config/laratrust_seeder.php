<?php
return [
    'role_structure' => [
        'super_admin' => [
            'admins'     => 'c,r,u,d',
            'users'      => 'c,r,u,d',
            'products'   => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'sliders'    => 'c,r,u,d',
            'services'   => 'c,r,u,d',
            'orders'     => 'c,r,u,d',
            'clients'    => 'c,r,u,d',
            'about'      => 'c,r,u,d',
            'portfolio'  => 'c,r,u,d',
            'subscribe'  => 'c,r,u,d',
            'settings'   => 'c,r,u,d',
            'trash'      => 'c,r,u,d',
        ],
        'admin' => [],
        'author' => [],
        'editor' => [],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
