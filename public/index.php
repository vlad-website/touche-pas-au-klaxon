<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Buki\Router\Router;
use App\Controllers\HomeController;

$router = new Router();

// Page d'accueil
$router->get('/', function () {
    (new HomeController())->index();
});

$router->run();