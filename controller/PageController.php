<?php

namespace app\controller;

use app\core\Controller;
use app\core\FileReader;
use app\core\Request;
use app\core\Response;
use app\model\EmployeeModel;

class PageController extends Controller
{
    public function dashboard(): bool|array|string
    {
        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->fetchById('1');
        return $this->render('dashboard', ['model' => $employee]);
    }

    public function jobDesk(): bool|array|string
    {
        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->fetchById('1');
        return $this->render('jobDesk', ['model' =>  $employee]);
    }

    public function employee(): bool|array|string
    {
        $employeeModel = new EmployeeModel();
        if(Request::method() === 'POST' && $_FILES['file'])
        {
            $userData = FileReader::readAndExplode($_FILES['file']['tmp_name']);
            $employeeModel->loadData($userData);
            if($employeeModel->validate())
            {
                if($employeeModel->insertAndSave())
                    return json_encode(['success' => true]);
            }
            return json_encode($employeeModel->errors);
        }
        if(Request::method() === 'POST')
        {
            $employeeModel->loadData($_POST, $_FILES);
            if($employeeModel->validate())
            {
                if($employeeModel->insertAndSave())
                    return json_encode(['success' => true]);
            }
            return json_encode($employeeModel->errors);

        }
        $employees = $employeeModel->fetchAll();
        return $this->render('employee', ['model' => $employees]);
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