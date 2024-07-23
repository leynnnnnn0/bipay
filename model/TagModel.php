<?php

namespace app\model;
use app\core\Application;
use app\core\DbModel;

class TagModel extends DbModel
{
    public string $id;
    public string $tag;
    public string $timestamp;

    function __construct()
    {
        $this->id = Application::$application->applicationUser->getId();
        $this->timestamp = date('Y-m-d H:i:s');

    }

    function tableName(): string
    {
        return 'tags';
    }

    public function attributes(): array
    {
        return [
            'id' => [],
            'tag' => [],
            'timestamp' => [],
        ];
    }
}