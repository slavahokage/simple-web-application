<?php

use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../env.php';
require __DIR__ . '/DBconfiguration.php';

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . '/definitions.php');
$containerBuilder->useAnnotations(true);
$container = $containerBuilder->build();

return $container;