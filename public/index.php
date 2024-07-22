<?php

use app\controller\LoginController;
use app\controller\RegisterController;
use app\controller\EmployeeController;
use app\controller\PageController;
use app\core\Application;

require_once '../functions.php';
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$config = [
    'database' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);
$app->router->get('/', [PageController::class, 'dashboard']);
$app->router->get('/job-desk', [PageController::class, 'jobDesk']);
$app->router->get('/leave', [PageController::class, 'leave']);

$app->router->get('/employee', [EmployeeController::class, 'employee']);
$app->router->post('/employee', [EmployeeController::class, 'createEmployee']);
$app->router->delete('/employee', [EmployeeController::class, 'deleteEmployee']);
$app->router->put('/employee', [EmployeeController::class, 'updateEmployee']);

$app->router->get('/register', [RegisterController::class, 'register']);
$app->router->post('/register', [RegisterController::class, 'registerAccount']);

$app->router->get('/login', [LoginController::class, 'login']);
$app->router->post('/login', [LoginController::class, 'authenticate']);


$app->run();