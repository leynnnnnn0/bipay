<?php

namespace app\controller;

use app\core\Controller;
use app\model\AuxModel;

class AdminDashboardController extends Controller
{
    public function admin()
    {
        $auxTag = new AuxModel();
        $query = "SELECT a.*, e.firstName, e.lastName
                  FROM aux a
                  JOIN employees e ON a.id = e.id";
        $result = $auxTag->customQuery($query);
        debug($result->fetchAll());
        return $this->render('adminDashboard', ['employees' => $result->fetchAll()]);
    }
}