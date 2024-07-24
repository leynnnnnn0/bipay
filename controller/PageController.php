<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
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
        $tagModel = new TagModel();
        $query = "SELECT * FROM tags WHERE (tag = 'PUNCH IN' OR tag = 'PUNCH OUT') AND id = :id ORDER BY tagId ASC";
        $statement = $tagModel->customQuery($query, ['id' => Application::$application->applicationUser->getId()]);
        $result = $statement->fetchAll();
        $data = [];
        foreach ($result as $key => $value)
        {
            $data[explode(" ", $value['timestamp'])[0]][] = [
                $value['tag'] => explode(" ", $value['timestamp'])[1]
            ];
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