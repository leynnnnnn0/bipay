<?php

namespace app\controller;

use app\core\Controller;
use app\core\Response;
use app\core\Session;
use app\model\AccountModel;
use JetBrains\PhpStorm\NoReturn;

class RegisterController extends Controller
{
    function __construct()
    {
        $this->layout = 'auth';
    }
    public function register(): bool|array|string
    {
        return $this->render('register');
    }

    #[NoReturn] public function registerAccount(): void
    {
        $accountModel = new AccountModel();
        $accountModel->loadData($_POST);
        if($accountModel->validate()){
            $accountModel->insertAndSave();
            Session::set_flash('success', "Account created successfully.");
            Response::redirect('/login');
        };
        Session::set_flash('details', $accountModel);
        Response::redirect('/register');
    }


}