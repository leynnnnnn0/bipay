<?php

use app\controller\AuxController;
use app\controller\LoginController;
use app\controller\LogoutController;
use app\controller\RegisterController;
use app\controller\EmployeeController;
use app\controller\PageController;
use app\core\Application;
use app\model\EmployeeInformationModel;

require_once '../functions.php';
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$config = [
    'userClass' => EmployeeInformationModel::class,
    'database' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);
$app->router->get('/', [PageController::class, 'dashboard'])->only('auth');
$app->router->get('/job-desk', [PageController::class, 'jobDesk'])->only('auth');
$app->router->get('/leave', [PageController::class, 'leave'])->only('auth');

$app->router->get('/employee', [EmployeeController::class, 'employee'])->only('auth');
$app->router->post('/employee', [EmployeeController::class, 'createEmployee'])->only('auth');
$app->router->delete('/employee', [EmployeeController::class, 'deleteEmployee'])->only('auth');
$app->router->put('/employee', [EmployeeController::class, 'updateEmployee'])->only('auth');

$app->router->get('/register', [RegisterController::class, 'register'])->only('guest');
$app->router->post('/register', [RegisterController::class, 'registerAccount'])->only('guest');

$app->router->get('/login', [LoginController::class, 'login'])->only('guest');
$app->router->post('/login', [LoginController::class, 'authenticate'])->only('guest');

$app->router->get('/logout', [LogoutController::class, 'logout'])->only('auth');

$app->router->post('/aux', [AuxController::class, 'aux'])->only('auth');

$app->run();