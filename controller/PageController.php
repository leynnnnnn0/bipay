<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\model\AttendanceModel;
use app\model\BenefitsModel;
use app\model\LeaveRequestModel;

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
        $leaveRequestModel = new LeaveRequestModel();
        $requests = $leaveRequestModel->findAllById(Application::$application->applicationUser->getId());
        $statusSummary = $leaveRequestModel::employeeLeaveStatusSummary($requests);

        $attendanceModel = new AttendanceModel();
        $result = $attendanceModel->fetchTags(Application::$application->applicationUser->getId(), ['PUNCH IN', 'PUNCH OUT']);
        $data = $attendanceModel->groupByDate($result);
        $data = $attendanceModel->getAdherence($data);

        return $this->render('jobDesk', ['data' => $data, 'requests' => $requests, 'summary' => $statusSummary]);
    }




}