<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Session;

class AuxController extends Controller
{
    public function aux()
    {
        $database = Application::$application->database;

        $employeeId = Application::$application->applicationUser->getId();
        $aux = $_POST['aux'];
        $insert = "INSERT INTO aux (employeeId, aux)
                  SELECT :employeeId, :aux 
                  WHERE NOT EXISTS (SELECT :employeeId FROM aux WHERE employeeId = :employeeId);";

        $statement = $database->query($insert, [':employeeId' => $employeeId, ':aux' => $aux]);
        $statement->execute();
        $statement->closeCursor();

        $update = "UPDATE aux SET aux = :aux WHERE employeeId = :employeeId;";
        $statement = $database->query($update, [':employeeId' => $employeeId, ':aux' => $aux]);
        $statement->execute();
        $statement->closeCursor();

        Session::set('aux', $aux);
    }
}