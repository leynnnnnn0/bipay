<?php

namespace app\controller;


use app\core\Application;
use app\core\Controller;
use app\core\Response;
use app\core\Session;
use JetBrains\PhpStorm\NoReturn;

class LogoutController extends Controller
{
    #[NoReturn] public function logout(): void
    {
        Application::$application->applicationUser = null;
        Session::clean();
        Response::redirect('/login');
    }
}