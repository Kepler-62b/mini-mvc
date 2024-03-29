<?php

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/docker/database/postgres/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/docker/database/postgres/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'container',
        'localhost' => [
            'adapter' => 'pgsql',
            'host' => 'localhost',
            'name' => 'adverts-board',
            'user' => 'postgres',
            'pass' => 'secret',
            'port' => '5432',
            'charset' => 'utf8',
        ],
        'container' => [
            'adapter' => 'pgsql',
            'host' => 'postgres',
            'name' => 'adverts-board',
            'user' => 'postgres',
            'pass' => 'secret',
            'port' => '5432',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
