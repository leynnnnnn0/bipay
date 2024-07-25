<?php

namespace app\controller;

use app\core\Controller;
use app\model\AuxModel;

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

        return $this->render('adminDashboard', ['employees' => $result, 'tags' => $tags]);
    }
}