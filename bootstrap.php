<?php
// Doctrine configuration
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array("src/Model"), $isDevMode);

// database configuration parameters
$conn = array(
    'dbname' => 'super_hero',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

$em = EntityManager::create($conn, $config);