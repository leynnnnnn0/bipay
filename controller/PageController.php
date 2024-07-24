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
use DateTime;

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
        $times = $attendanceModel->getAllTime($data);
        foreach ($times as $time => $value)
        {
            $punchIn = new DateTime($value[0]);
            $punchOut = new DateTime($value[1]);
            $interval = $punchIn->diff($punchOut);
            $totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
            $data[$time] = ['adherence' => number_format($attendanceModel->calculateAdherence($totalMinutes), 2, '.', '')];
        }
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