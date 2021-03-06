<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Zend\Config\Config;

// Change to the project root, to simplify resolving paths
chdir(dirname(__DIR__));

// Setup autoloading
require 'vendor/autoload.php';

$container = include 'config/container.php';
$app       = $container->get(Zend\Expressive\Application::class);

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();

$preRunTime = microtime(true);

$app->run();
