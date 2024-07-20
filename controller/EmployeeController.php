<?php

namespace app\controller;


use app\core\Application;
use app\core\Controller;
use app\core\FileReader;
use app\core\Request;
use app\model\EmployeeModel;

class EmployeeController extends Controller
{
    public function employee(): bool|array|string
    {
        $employeeModel = new EmployeeModel();
        // For deleting an employee
        if(Request::method() === 'POST' && Request::customMethod() === 'DELETE')
        {
            return json_encode(['success' => $employeeModel->removeById($_POST['id'])]);
        }
        // For adding an employee with an employee form
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
        // For adding an employee manually
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
        // For viewing an employee details
        if(Request::method() === 'GET' && $_GET['id'])
        {
            $employee = $employeeModel->fetchById($_GET['id']);
            require_once Application::$ROOT_PATH . '/view/partial/viewEmployee.php';
            exit;
        }
        $employees = $employeeModel->fetchAll();
        return $this->render('employee', ['model' => $employees]);
    }
}