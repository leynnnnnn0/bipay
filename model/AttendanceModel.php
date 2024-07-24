<?php

namespace app\model;

use app\core\DbModel;

class AttendanceModel extends DbModel
{

    public function groupByDate($data): array
    {
        $result = [];
        foreach ($data as $key => $value)
        {
            $result[explode(" ", $value['timestamp'])[0]][] = [
                $value['tag'] => explode(" ", $value['timestamp'])[1]
            ];
        }
        return $result;
    }
    public function fetchTags(string $id, array $condition = []): bool|array
    {
        $tableName = self::tableName();
        $values = implode(" OR ", array_map(fn($value) => "tag = '$value'", $condition));
        if(!empty($condition))
        {
            $query = "SELECT * FROM $tableName WHERE ($values) AND id = :id ORDER BY tagId ASC";
        }else {
            $query = "SELECT * FROM $tableName WHERE id = :id ORDER BY tagId ASC";
        }
        $statement = $this->customQuery($query, ["id" => $id]);
        return $statement->fetchAll();
    }

    function tableName(): string
    {
       return 'tags';
    }

    public function attributes(): array
    {
        return [];
    }
}