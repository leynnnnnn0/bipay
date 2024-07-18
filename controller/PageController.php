<?php

namespace app\controller;

use app\core\Controller;

class PageController extends Controller
{
    public function dashboard()
    {
        return $this->render('dashboard');
    }

    public function jobDesk()
    {
        return $this->render('jobDesk');
    }

    public function employee()
    {
        return $this->render('employee');
    }

    public function leave()
    {
        return $this->render('leave');
    }

}