<?php
return [
    'doctrine' => [
        'connection' => [
            // default connection name
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'root',
                    'password' => 'root',
                    'dbname' => 'son_zf3_doctrine',
                    'driverOptions' => [
                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    ]
                ]
            ]
        ],
        'authentication' => [
            'orm_default' => [
                'object_manager' => \Doctrine\ORM\EntityManager::class,
                'identity_class' => \User\Entity\User::class,
                'identity_property' => 'username',
                'credential_property' => 'password',
                'credential_callable' => function (\User\Entity\User $user, $passwordSent) {
                    return password_verify($passwordSent, $user->getPassword());
                }
            ]
        ]
    ]
];

/*
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
*/