<?php

namespace app\model;

use app\core\Application;
use app\core\DbModel;

class AuxTag extends DbModel
{
    public string $employeeId;
    public string $aux;
    public string $timestamp;

    function tableName(): string
    {
        return 'aux';
    }

    public function attributes(): array
    {
        return [
            'employeeId',
            'aux',
            'timestamp',
        ];
    }
}