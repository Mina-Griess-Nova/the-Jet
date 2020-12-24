<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin'=>[
            'admins'=>'c,r,u,d',
            'cusines'=>'c,r,u,d',
            'sections'=>'c,r,u,d',
            'addons'=>'c,r,u,d',
            'allergenes'=>'c,r,u,d',
            'categories'=>'c,r,u,d',
            'cooks'=>'c,r,u,d',
            'coupons'=>'c,r,u,d',
            'customers'=>'c,r,u,d',
            'cities'=>'c,r,u,d',
            'settings'=>'c,r,u,d',
            'VIP'=>'c,r,u,d',
            'orders'=>'c,r,u,d',
            'dishes'=>'c,r,u,d',
        ],
        'admin'=>[],
        'cook'=>[],
        'customer'=>[],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
