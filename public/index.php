<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Buki\Router\Router;

$router = new Router();

// Page d'accueil
$router->get('/', function () {
    echo 'Accueil - Touch pas au klaxon';
});

// Test route
$router->get('/test', function () {
    echo 'Router OK 🚗';
});

$router->run();