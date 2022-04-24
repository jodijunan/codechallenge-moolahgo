<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

return [
    'migrations' => 'migrations',
    'default' => env('DB_CONNECTION', 'mysql'),
    'redis' => [
        'cluster' => false,
        'client' => 'predis',
        'options' => [
            'prefix' => env('REDIS_PREFIX', 'proc:'),
        ],
        'default' => [
            'host' => env('REDIS_SERVER', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DATABASE', 1),
        ],
    ],
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_NAME', 'forge'),
            'username' => env('DB_USER', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options' => [
                \PDO::ATTR_EMULATE_PREPARES => true
            ],
        ],
    ],
];
