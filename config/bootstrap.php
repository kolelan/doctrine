<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require "vendor/autoload.php";
$isDevMode = true;
$paths = array("src"); // Путь до каталога, где находятся классы сущностей, проецируемые на БД
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$parameters = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'CDsfEdJ_17',
    'dbname' => 'doctrine',
    'host' => 'localhost'
];
$dbParams = array(
    'driver' => $parameters['driver'],
    'host' => $parameters['host'],
    'user' => $parameters['user'],
    'password' => $parameters['password'],
    'dbname' => $parameters['dbname'],
);

$entityManager = EntityManager::create($dbParams, $config);