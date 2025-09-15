<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' => [
    'users' => [
        'driver' => 'ldap',
        'model' => \LdapRecord\Models\ActiveDirectory\User::class,

        'rules' => [],

        'database' => [
            'model' => \App\Models\User::class,
            'sync_passwords' => false,
            'sync_attributes' => [
                'name'  => 'cn',
                'email' => function ($ldap) {
                    return $ldap->getFirstAttribute('mail')
                        ?: $ldap->getFirstAttribute('userprincipalname')
                        ?: ($ldap->getFirstAttribute('samaccountname') . '@empresa.local');
                },
            ],
        ],

        'ldap' => [
            'locate_users_by' => 'samaccountname',
            'bind_users_by'   => 'distinguishedname',
        ],
    ],
],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
