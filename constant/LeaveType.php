<?php

namespace app\constant;

enum LeaveType : string
{
    case SICK_LEAVE = "SICK LEAVE";
    case PAID_LAVE = "PAID LEAVE";

    public static function getLeaveTypes(): array
    {
        return [
            LeaveType::SICK_LEAVE->value,
            LeaveType::PAID_LAVE->value,
        ];
    }


}