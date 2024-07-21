<?php

namespace app\controller;

use app\core\Controller;
use app\core\Response;
use app\model\AccountModel;

class AuthController extends Controller
{
    function __construct()
    {
        $this->layout = 'auth';
    }
    public function register(): bool|array|string
    {
        return $this->render('register');
    }

    public function registerAccount(): bool|array|string
    {
        $accountModel = new AccountModel();
        $accountModel->loadData($_POST);
        if($accountModel->validate()){
            $accountModel->insertAndSave();
            Response::redirect('/login');
        };
        var_dump($accountModel->errors);
        exit;
    }

    public function login(): bool|array|string
    {
        return $this->render('login');
    }

}