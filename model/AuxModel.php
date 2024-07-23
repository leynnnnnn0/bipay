<?php

namespace app\model;
use app\core\Application;
use app\core\DbModel;

class AuxModel extends DbModel
{
    public string $employeeId;
    public string $aux = 'NOT READY';
    public string $timestamp = 'CURRENT_TIMESTAMP';

    function __construct()
    {
        $this->employeeId = Application::$application->applicationUser->getId();
    }

    function tableName(): string
    {
        return 'aux';
    }

    public function attributes(): array
    {
        return [
            'employeeId' => [],
            'aux' => [],
            'timestamp' => [],
        ];
    }
}