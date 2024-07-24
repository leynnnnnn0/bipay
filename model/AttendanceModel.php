<?php

namespace app\model;

use app\core\DbModel;
use DateTime;

class AttendanceModel extends DbModel
{

    public function groupByDate($data): array
    {
        $result = [];
        foreach ($data as $key => $value)
        {
            $date = explode(" ", $value['timestamp'])[0];
            $time = explode(" ", $value['timestamp'])[1];
            $result[$date][] = [
                $value['tag'] => $time
            ];
        }
        return $result;
    }
    public function getAdherence(array $data): array
    {
        $times = self::getAllTime($data);
        foreach ($times as $time => $value)
        {
            $punchIn = new DateTime($value[0]);
            $punchOut = new DateTime($value[1]);
            $interval = $punchIn->diff($punchOut);
            $totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
            $data[$time] = ['adherence' => number_format(self::calculateAdherence($totalMinutes), 2, '.', '')];
        }
        return $data;
    }

    public function getAllTime($data): array
    {
        $toCompute = [];
        foreach ($data as $key => $value) {
            for($i = 0; $i < count($value); $i++) {
                $tag = $value[$i];
                foreach ($tag as $aux => $time)
                {
                    $toCompute[$key][] = $time;
                }
            }
        }
        return $toCompute;
    }

    public function calculateAdherence($scheduledTimeWorked): float|int
    {
        return ($scheduledTimeWorked / 480) * 100;
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