<?php

namespace app\controller;

use app\core\Controller;

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
        var_dump($_POST);
        exit;
    }

}