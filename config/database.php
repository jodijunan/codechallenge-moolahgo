<?php
$database = [
    'driver' => 'sqlite',
    'drivers' => [
        'mysql' => [
            'host' => 'localhost',
            'port' => 3306,
            'username' => 'root',
            'password' => 'test'
        ],
        'sqlite' => [
            'database' => $app->getStorageRoot() . DIRECTORY_SEPARATOR . 'mydb.sq3',
            'version' => 'sqlite',
            'type' => 'disk', // can be memory
        ]
    ]
];

$app->setDatabaseConfig($database);
