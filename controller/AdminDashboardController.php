<?php

namespace app\controller;

use app\core\Controller;
use app\model\AuxTag;

class AdminDashboardController extends Controller
{
    public function admin()
    {
        $auxTag = new AuxTag();
        $query = "SELECT a.*, e.firstName, e.lastName
                  FROM aux a
                  JOIN employees e ON a.employeeId = e.id";
        $result = $auxTag->customQuery($query);
        return $this->render('adminDashboard', ['employees' => $result->fetchAll()]);
    }
}