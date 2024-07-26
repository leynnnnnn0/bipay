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
        $query = "SELECT a.*, e.firstName, e.lastName
                  FROM aux a
                  JOIN employees e ON a.id = e.id";
        $result = $auxTag->customQuery($query);
        $result = $result->fetchAll();

        $tags = [];
        foreach ($result as $tag) {
            $aux = $tag['aux'];
            if(array_key_exists($aux, $tags))
            {
                $tags[$aux] += 1;
                continue;
            }
            $tags[$aux] = 1;
        }

        $leaveRequestModel = new LeaveRequestModel();
        $query = "SELECT l.startDate, l.endDate, e.firstName, e.lastName
                  FROM leave_requests l
                  JOIN employees e ON l.id = e.id AND l.status = 'PENDING'";
        $statement = $leaveRequestModel->customQuery($query);

        return $this->render('adminDashboard', ['employees' => $result, 'tags' => $tags, 'requests' => $statement->fetchAll()]);
    }
}