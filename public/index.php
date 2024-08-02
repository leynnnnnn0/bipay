<?php

use app\controller\AdminDashboardController;
use app\controller\AuxController;
use app\controller\LeaveController;
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
$app->router->get('/', [PageController::class, 'dashboard'])->middleware('auth');
$app->router->get('/job-desk', [PageController::class, 'jobDesk'])->middleware('auth');
$app->router->get('/leave', [LeaveController::class, 'leaveSummary'])->middleware('auth');

$app->router->get('/employee', [EmployeeController::class, 'employee'])->middleware('auth');
$app->router->post('/employee', [EmployeeController::class, 'createEmployee'])->middleware('auth');
$app->router->delete('/employee', [EmployeeController::class, 'deleteEmployee'])->middleware('auth');
$app->router->put('/employee', [EmployeeController::class, 'updateEmployee'])->middleware('auth');

$app->router->get('/register', [RegisterController::class, 'register'])->middleware('guest');
$app->router->post('/register', [RegisterController::class, 'registerAccount'])->middleware('guest');

$app->router->get('/login', [LoginController::class, 'login'])->middleware('guest');
$app->router->post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

$app->router->get('/logout', [LogoutController::class, 'logout'])->middleware('auth');

$app->router->post('/aux', [AuxController::class, 'aux'])->middleware('auth');
$app->router->post('/punch-in', [AuxController::class, 'punchIn'])->middleware('auth');
$app->router->post('/punch-out', [AuxController::class, 'punchOut'])->middleware('auth');
$app->router->get('/admin', [AdminDashboardController::class, 'admin'])->middleware('admin');

$app->router->get('/leave-request', [LeaveController::class, 'leaveRequestList'])->middleware('auth');

$app->router->post('/leave-request', [LeaveController::class, 'leaveRequest'])->middleware('auth');
$app->router->post('/download', [LeaveController::class, 'download'])->middleware('auth');

$app->router->post('/approve-request', [LeaveController::class, 'approve'])->middleware('auth');



$app->run();