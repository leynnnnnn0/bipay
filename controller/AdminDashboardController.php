<?php

namespace app\controller;

use app\core\Controller;
use app\model\AuxModel;
use app\model\LeaveRequestModel;

class AdminDashboardController extends Controller
{
    public function admin(): bool|array|string
    {
        $auxTag = new AuxModel();
        $result = $auxTag->auxTags();
        $tags = AuxModel::tagsSummary($result);

        $leaveRequestModel = new LeaveRequestModel();
        $pendingRequests = $leaveRequestModel->pendingRequests();

        return $this->render('adminDashboard', ['employees' => $result, 'tags' => $tags, 'requests' => $pendingRequests]);
    }
}