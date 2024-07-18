<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\model\EmployeeModel;

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

    public function employee(Request $request)
    {
        $employeeModel = new EmployeeModel();
        if($request->method() === 'POST')
        {
            $employeeModel->loadPhoto($_FILES);
            $employeeModel->loadData($_POST);
            $employeeModel->validate();
        }
        return $this->render('employee');
    }

    public function leave()
    {
        return $this->render('leave');
    }

}