<?php

declare(strict_types=1);

define('ROOT', dirname(__DIR__));



require_once __DIR__ . '/../vendor/autoload.php';

use Buki\Router\Router;
use App\Core\Database;

$router = new Router();


// Page d'accueil
$router->get('/', function () {
    (new \App\Controllers\HomeController())->index();
});

$router->get('/db-test', function () {
    $pdo = Database::getInstance();

    $pdo->query('SELECT 1');

    echo 'Connexion BDD OK';
});

$router->get('/login', function () {
    (new \App\Controllers\AuthController())->showLogin();
});

$router->post('/login', function () {
    (new \App\Controllers\AuthController())->login();
});

$router->get('/logout', function () {
    (new \App\Controllers\AuthController())->logout();
});

$router->get('/dashboard', function () {
    (new \App\Core\Middleware\AuthMiddleware())->handle();
    (new \App\Controllers\DashboardController())->index();
});

$router->run();