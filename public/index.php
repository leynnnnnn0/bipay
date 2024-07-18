<?php

use app\controller\PageController;
use app\core\Application;

require_once '../functions.php';
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));
$app->router->get('/', [PageController::class, 'dashboard']);
$app->router->get('/job-desk', [PageController::class, 'jobDesk']);
$app->router->get('/employee', [PageController::class, 'employee']);
$app->run();