<?php

namespace app\model;
use app\core\Application;
use app\core\DbModel;

class AuxModel extends DbModel
{
    public string $id;
    public string $aux = 'NOT READY';
    public string $timestamp;

    function __construct()
    {
        $this->id = Application::$application->applicationUser->getId();
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function tableName(): string
    {
        return 'aux';
    }

    public function attributes(): array
    {
        return [
            'id' => [],
            'aux' => [],
            'timestamp' => [],
        ];
    }
}