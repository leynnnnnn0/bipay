<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Response;
use app\core\Session;
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
        Session::set_flash('details', $accountModel);
        Response::redirect('/register');
    }

    public function login(): bool|array|string
    {
        return $this->render('login');
    }

}