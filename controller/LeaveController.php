<?php

namespace app\controller;

use app\core\Controller;
use app\core\File;
use app\model\LeaveRequestModel;

class LeaveController extends Controller
{
    public function leaveSummary(): bool|array|string
    {
        $leaveRequestModel = new LeaveRequestModel();
        $result = $leaveRequestModel->fetchAll();
        return $this->render('leave', [ 'data'=> $result]);
    }

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

    public function leaveRequestList(): bool|array|string
    {
        $leaveRequestModel = new LeaveRequestModel();
        $query = "SELECT r.*, e.firstName, e.lastName, e.department, e.id
                    FROM leave_requests r
                    JOIN employees e ON r.id = e.id";
        $statement = $leaveRequestModel->customQuery($query);
        $statement->execute();
        return $this->render('leaveRequest', ['requests' => $statement->fetchAll()]);
    }

    public function approve(): bool|string
    {
        $leaveRequestModel = new LeaveRequestModel();
        $result = $leaveRequestModel->update($_POST['id'], ['status' => $_POST['status']]);
        if($result)
            return json_encode(['success' => true]);
        return json_encode(['success' => false]);
    }

    public function download(): string
    {
        File::download($_POST['fileName']);
        return "DONE";
    }
}