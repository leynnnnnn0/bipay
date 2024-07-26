<?php

namespace app\model;

use app\constant\FormError;
use app\core\DbModel;

class LeaveRequestModel extends DbModel
{
    public string $id;
    public string $leaveType;
    public string $startDate;
    public string $endDate;
    public string $attachment = 'N/A';
    public string $status = "PENDING";

    public function pendingRequests() : array
    {
        $query = "SELECT l.startDate, l.endDate, e.firstName, e.lastName
                  FROM leave_requests l
                  JOIN employees e ON l.id = e.id AND l.status = 'PENDING'";
        $statement = self::customQuery($query);
        return $statement->fetchAll();
    }
    public static function employeeLeaveStatusSummary(array $requests): array
    {
        $requestData = [];
        foreach ($requests as $request) {
            $status = $request['status'];
            if(array_key_exists($status, $requestData))
            {
                $requestData[$status] += 1;
                continue;
            }
            $requestData[$status] = 1;
        }
        return $requestData;
    }

    public static function allLeaveSummary(array $result) : array
    {
        $data = [
            'ON LEAVE' => 0,
            'PENDING' => 0
        ];
        foreach ($result as $value) {
            $currentDate = new \DateTime();
            $startDate = \DateTime::createFromFormat('Y-m-d', $value['startDate'])->format('Y-m-d');
            $endDate = \DateTime::createFromFormat('Y-m-d', $value['endDate'])->format('Y-m-d');
            if($value['status'] === 'APPROVED')
            {
                if($currentDate->format('Y-m-d') >= $startDate && $currentDate->format('Y-m-d') <= $endDate) {
                    $data['ON LEAVE'] += 1;
                }
            }
            if($value['status'] === 'PENDING')
                $data['PENDING'] += 1;
        }
        return $data;
    }

    function tableName(): string
    {
        return 'leave_requests';
    }

    public function attributes(): array
    {
        return [
            'id' => [FormError::REQUIRED],
            'leaveType' => [FormError::REQUIRED],
            'startDate' => [FormError::REQUIRED],
            'endDate' => [FormError::REQUIRED],
            'attachment' => [],
            'status' => [FormError::REQUIRED],
        ];
    }
}