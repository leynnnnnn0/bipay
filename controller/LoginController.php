<?php

namespace app\controller;

use app\core\Controller;

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
}