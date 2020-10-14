<?php

declare (strict_types=1);

use Doctrine\DBAL\Driver\PDO\PgSQL\Driver;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Persistence\Mapping\Driver\MappingDriverChain;

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'driverClass' => Driver::class,
                    'driverOptions' => array(PDO::ATTR_EMULATE_PREPARES => true),
                    'charset' => 'utf8',
                    'host' => 'tuffi.db.elephantsql.com',
                    'port' => '5432',
                    'user' => 'inoepokz',
                    'password' => 'v1a_Z3r8m4ocXgdblwef5qZ1RyIFgzqb',
                    'dbname' => 'inoepokz',
                ],
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => MappingDriverChain::class,
                'drivers' => [
                    'GeoNamesApp\City\Entity' => 'city_entity',
                    'GeoNamesApp\State\Entity' => 'state_entity',
                ],
            ],
            'city_entity' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . './../../src/GeoNamesApp/src/City/Entity'],
            ],
            'state_entity' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . './../../src/GeoNamesApp/src/State/Entity'],
            ],
        ],
    ],
];
