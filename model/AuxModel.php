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

    public function auxTags() : array | bool
    {
        $query = "SELECT a.*, e.firstName, e.lastName
                  FROM aux a
                  JOIN employees e ON a.id = e.id";
        $result = self::customQuery($query);
        return $result->fetchAll();
    }

    public static function tagsSummary(array $result) : array
    {
        $tags = [];
        foreach ($result as $tag) {
            $aux = $tag['aux'];
            if(array_key_exists($aux, $tags))
            {
                $tags[$aux] += 1;
                continue;
            }
            $tags[$aux] = 1;
        }
        return $tags;
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