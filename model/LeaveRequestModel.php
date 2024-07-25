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