<?php

namespace app\controller;

use app\core\Controller;
use app\core\File;
use app\model\LeaveRequestModel;

class LeaveController extends Controller
{
    public function leaveRequest(): bool|string
    {
        $leaveRequestModel = new LeaveRequestModel();
        $leaveRequestModel->loadData($_POST);
        if($leaveRequestModel->validate()){
            $leaveRequestModel->loadFile($_FILES, "attachment");
            $leaveRequestModel->insertAndSave();
            return json_encode(['success' => true]);
        }
        return json_encode(['success' => false]);

    }

    public function download()
    {
        File::download($_POST['fileName']);
        return "DONE";
    }
}