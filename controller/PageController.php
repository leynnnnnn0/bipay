<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\AttendanceModel;
use app\model\BenefitsModel;
use app\model\EmployeeModel;
use app\model\TagModel;

class PageController extends Controller
{
    public function dashboard(): bool|array|string
    {
        $benefitsModel = new BenefitsModel();
        $result = $benefitsModel->findById(Application::$application->applicationUser->getId());
        $benefitsModel->loadData($result);
        return $this->render('dashboard', ['benefits' => $benefitsModel]);
    }

    public function jobDesk(): bool|array|string
    {
        $attendanceModel = new AttendanceModel();
        $result = $attendanceModel->fetchTags(Application::$application->applicationUser->getId(), ['PUNCH IN', 'PUNCH OUT']);
        $data = $attendanceModel->groupByDate($result);
        return $this->render('jobDesk', ['data' => $data]);
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