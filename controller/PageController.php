<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
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

    public function employee()
    {
        $employeeModel = new EmployeeModel();
        if(Request::method() === 'POST')
        {
            $employeeModel->loadData($_POST);
            $employeeModel->loadPhoto($_FILES);
            if($employeeModel->validate())
            {
                Response::redirect('dashboard');
            }
            return $this->render('employee');
        }
        return $this->render('employee');
    }

    public function leave()
    {
        return $this->render('leave');
    }

}