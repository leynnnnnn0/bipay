<?php
use app\controller\PageController;
use app\core\Application;

require_once '../functions.php';
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
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
$app->router->get('/employee', [PageController::class, 'employee']);
$app->router->post('/employee', [PageController::class, 'employee']);
$app->router->get('/leave', [PageController::class, 'leave']);
$app->run();