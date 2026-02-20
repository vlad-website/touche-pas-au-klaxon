<?php
declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('ROOT', dirname(__DIR__));

require_once __DIR__ . '/../vendor/autoload.php';

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

use App\Controllers\TrajetController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Core\Middleware\AuthMiddleware;

$dispatcher = simpleDispatcher(function (RouteCollector $r) {

    // HOME
    $r->addRoute('GET', '/', function () {
        (new TrajetController())->index();
    });

    // AUTH
    $r->addRoute('GET', '/login', function () {
        (new AuthController())->showLogin();
    });

    $r->addRoute('POST', '/login', function () {
        (new AuthController())->login();
    });

    $r->addRoute('GET', '/logout', function () {
        (new AuthController())->logout();
    });

    // DASHBOARD
    $r->addRoute('GET', '/dashboard', function () {
        (new AuthMiddleware())->handle();
        (new DashboardController())->index();
    });

    // TRAJETS
    $r->addRoute('GET', '/trajets', function () {
        (new TrajetController())->index();
    });

    $r->addRoute('GET', '/trajets/create', function () {
        (new TrajetController())->create();
    });

    $r->addRoute('POST', '/trajets/store', function () {
        (new TrajetController())->store();
    });

    $r->addRoute('GET', '/trajets/{id:\d+}/edit', function ($args) {
        (new TrajetController())->edit((int)$args['id']);
    });

    $r->addRoute('POST', '/trajets/{id:\d+}/update', function ($args) {
        (new TrajetController())->update((int)$args['id']);
    });

    $r->addRoute('POST', '/trajets/{id:\d+}/delete', function ($args) {
        (new TrajetController())->delete((int)$args['id']);
    });
});

// ===== DISPATCH =====

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo '404 NOT FOUND';
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo '405 METHOD NOT ALLOWED';
        break;

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars);
        break;
}
