<?php

return [

    // Log de operaciones LDAP (usa .env LDAP_LOGGING)
    'logging' => env('LDAP_LOGGING', false),

    'connections' => [

        // 👇 nombre de conexión: "default"
        'default' => [
            'hosts' => [env('LDAP_HOST', '127.0.0.1')],
            'port' => (int) env('LDAP_PORT', 389),
            'base_dn' => env('LDAP_BASE_DN', ''),
            'username' => env('LDAP_USERNAME', null),
            'password' => env('LDAP_PASSWORD', null),

            'use_ssl' => filter_var(env('LDAP_USE_SSL', false), FILTER_VALIDATE_BOOLEAN),
            'use_tls' => filter_var(env('LDAP_USE_TLS', false), FILTER_VALIDATE_BOOLEAN),

            // Opciones recomendadas
            'version' => 3,
            'timeout' => (int) env('LDAP_TIMEOUT', 5),
            'follow_referrals' => false,
        ],

    ],
];

