<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
use Zend\Db\Adapter\AdapterServiceFactory;

return [
    //informações para conexao com o banco
    'db' => [
        'database' => 'alfa',
        'driver' => 'Pdo_Mysql',
        'host' => 'localhost'
    ],
    'Service_manager' => [
        'factories' =>   [
            'DbAdapter' => AdapterServiceFactory::class
        ]       //conjunto de fabricas
    ]
];
