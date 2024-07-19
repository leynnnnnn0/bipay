<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\EmployeeModel;

class PageController extends Controller
{
    public function dashboard(): bool|array|string
    {
        $params = [
            "name" => "Speed"
        ];
        return $this->render('dashboard', $params);
    }

    public function jobDesk(): bool|array|string
    {
        return $this->render('jobDesk');
    }

    public function employee(): bool|array|string
    {
        $employeeModel = new EmployeeModel();
        if(Request::method() === 'POST')
        {
            $employeeModel->loadData($_POST, $_FILES);
            if($employeeModel->validate())
            {
                debug($employeeModel->insertAndSave());
                Response::redirect('dashboard');
            }
            debug($employeeModel->errors);
            $errors = $employeeModel->errors;
            return $this->render('employee', $errors);
        }
        return $this->render('employee');
    }

    public function leave(): bool|array|string
    {
        $employeeModel = new EmployeeModel();
        if(Request::method() === 'POST')
        {
            $employeeModel->loadData($_POST);

            if($employeeModel->validate())
            {
                Response::redirect('dashboard');
            }
            return $this->render('leave', ['model' => $employeeModel]);
        }
        return $this->render('leave', ['model' => $employeeModel]);
    }

}