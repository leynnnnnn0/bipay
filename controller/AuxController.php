<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Session;
use app\model\AuxModel;

class AuxController extends Controller
{
    public function aux()
    {
        $auxModel = new AuxModel();
        $auxModel->loadData($_POST);
        $auxModel->updateById();


//        $employeeId = Application::$application->applicationUser->getId();
//        $aux = $_POST['aux'];

//        $query = "INSERT INTO tags (employeeId, tag) VALUES(:employeeId, :tag);";
//        $statement = Application::$application->database->
//        query($query, [':id' => $employeeId, ':tag' => $aux]);
//        $statement->closeCursor();

        Session::set('aux', $auxModel->aux);
    }

    public function punchIn(): string|bool
    {
        $employeeId = Application::$application->applicationUser->getId();
        $query = "INSERT INTO tags (employeeId, tag) VALUES(:employeeId, :tag);";
        $statement = Application::$application->database->
        query($query, [':employeeId' => $employeeId, ':tag' => 'PUNCH IN']);
        $statement->closeCursor();
        Session::set('PUNCH IN', date('h:i:s A'));
        return json_encode(['time' => date('h:i:s A')]);
    }

    public function punchOut(): string|bool
    {
        $employeeId = Application::$application->applicationUser->getId();
        $statement = Application::$application->database->query("DELETE FROM aux WHERE id = :id;", [":id" => $employeeId]);
        $statement->closeCursor();
        $query = "INSERT INTO tags (employeeId, tag) VALUES(:employeeId, :tag);";
        $statement = Application::$application->database->
        query($query, [':employeeId' => $employeeId, ':tag' => 'PUNCH OUT']);
        $statement->closeCursor();
        Session::set('PUNCH OUT', date('h:i:s A'));
        return json_encode(['time' => date('h:i:s A')]);
    }

}