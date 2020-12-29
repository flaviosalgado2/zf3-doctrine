<?php
return [
    'doctrine' => [
        'connection' => [
            // default connection name
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOSqlite\Driver::class,
                'params' => [
                    'path' => sprintf('%s/data/blog.db', realpath(getcwd()))
                ],
            ],
        ],
    ],
];