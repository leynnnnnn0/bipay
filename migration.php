<?php
use app\core\Application;
use app\model\EmployeeInformationModel;

require_once 'functions.php';
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$config = [
    'userClass' => EmployeeInformationModel::class,
    'database' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);
$app->database->initializeMigration();