<?php

namespace app\controller;
use app\core\Application;
use app\core\Controller;
use app\core\FileReader;
use app\core\Image;
use app\core\Request;
use app\model\EmployeeModel;

class EmployeeController extends Controller
{

    public function deleteEmployee(): bool|string
    {
        $employeeModel = new EmployeeModel();
        $imageName = $_POST['photo'];
        Image::remove($imageName, Application::$ROOT_PATH . "/public/avatar/");
        return json_encode(['success' => $employeeModel->removeById($_POST['id'])]);
    }

    public function employee(): bool|array|string
    {
        $employeeModel = new EmployeeModel();
        // For updating an employee detail
        if(Request::method() === 'POST' && Request::customMethod() === 'PUT')
        {
            if(isset($_POST['_update']) && $_POST['_update'] === 'true')
            {
                $employeeModel->loadData($_POST, $_FILES);
                if($employeeModel->validate(['email' => $_POST['currentEmail']]))
                {
                    // The goal is to not check the email if it's already existing if it is different from the current email
                    $employeeModel->updateById($_POST['id'], $employeeModel->attributes(), $_POST['currentPhoto']);
                    Image::update($_POST['currentPhoto'], $_FILES['photo'], Application::$ROOT_PATH ."/public/avatar");
                    return json_encode(['success' => true]);
                }
                return json_encode($employeeModel->errors);
            }
            $employee = $employeeModel->findById($_POST['id']);
            require_once Application::$ROOT_PATH . "/view/partial/editEmployeeForm.php";
            exit;
        }
//        // For deleting an employee
//        if(Request::method() === 'POST' && Request::customMethod() === 'DELETE')
//        {
//            $imageName = $_POST['photo'];
//            Image::remove($imageName, Application::$ROOT_PATH . "/public/avatar/");
//            return json_encode(['success' => $employeeModel->removeById($_POST['id'])]);
//        }
        // For adding an employee with an employee form
        if(Request::method() === 'POST' && isset($_FILES['file']))
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
            $employee = $employeeModel->findById($_GET['id']);
            require_once Application::$ROOT_PATH . '/view/partial/viewEmployee.php';
            exit;
        }
        $employees = $employeeModel->fetchAll();
        return $this->render('employee', ['model' => $employees]);
    }
}