<?php
declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__DIR__));
require ROOT . '/vendor/autoload.php';

use Buki\Router\Router;

$router = new Router([
    'debug' => true,
    'paths' => [
        'controllers' => ROOT . '/app/Controllers',
    ],
]);

/* ================= HOME ================= */
$router->get('/', 'TrajetController@index');

/* ================= TRAJETS ================= */
$router->get('/trajets', 'TrajetController@index');
$router->get('/trajets/create', 'TrajetController@create');
$router->post('/trajets/store', 'TrajetController@store');

$router->get('/trajets/:id/edit', 'TrajetController@edit');
$router->post('/trajets/:id/update', 'TrajetController@update');
$router->post('/trajets/:id/delete', 'TrajetController@delete');

/* ================= AUTH ================= */
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

/* ================= ADMIN ================= */
$router->get('/admin', 'AdminController@dashboard');
$router->get('/admin/users', 'AdminController@users');
$router->get('/admin/agences', 'AdminController@agences');
$router->get('/admin/trajets', 'AdminController@trajets');
$router->post('/admin/trajets/:id/delete', 'AdminController@deleteTrajet');

$router->get('/admin/agences/create', 'AdminController@createAgence');
$router->post('/admin/agences/store', 'AdminController@storeAgence');
$router->get('/admin/agences/:id/edit', 'AdminController@editAgence');
$router->post('/admin/agences/:id/update', 'AdminController@updateAgence');
$router->post('/admin/agences/:id/delete', 'AdminController@deleteAgence');

$router->run();