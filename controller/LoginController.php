<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Response;
use app\core\Session;
use app\model\LoginModel;
use JetBrains\PhpStorm\NoReturn;

class LoginController extends Controller
{
    function __construct()
    {
        $this->layout = 'auth';
    }
    public function login(): bool|array|string
    {
        return $this->render('login');
    }

    #[NoReturn] public function authenticate(): void
    {
        $loginModel = new LoginModel();
        $loginModel->loadData($_POST);
        if(!$loginModel->validate() || !$loginModel->authenticate($loginModel->email, $loginModel->password))
        {
           Session::set_flash('details', $loginModel);
           Response::redirect('/login');
        }
        Session::set_flash('success', 'Login successfully.');
        Application::$application->login();
        Response::redirect('/');
    }
}