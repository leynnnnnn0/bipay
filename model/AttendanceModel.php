<?php

namespace app\model;

use app\core\DbModel;

class AttendanceModel extends DbModel
{

    public function groupByDate($data): array
    {
        // Putting the date as the key for tags
        //"2024-07-24" => ['tag' => 'time', 'tag' => 'time']
        $result = [];
        foreach ($data as $key => $value)
        {
            $result[explode(" ", $value['timestamp'])[0]][] = [
                $value['tag'] => explode(" ", $value['timestamp'])[1]
            ];
        }
        return $result;
    }

    public function getTotalTime($toCompute)
    {
        foreach ($toCompute as $date => $time) {
            $total = (int) implode("", explode(":", $time[0]));
            for($i = 1; $i < count($time); $i++)
            {
                $total -= implode("", explode(":", $time[$i]));
            }
            // Formatting the time from 0000 to 00:00
            $totalTime = (string) abs($total);
            $count = strlen($totalTime);
            $array= [];
            $index = 0;

            while($index < $count) {
                if($count % 2 != 0 && $index == 0) {
                    $array[] = $totalTime[$index];
                    $index++;
                    continue;
                }
                $array[] = $totalTime[$index] . $totalTime[$index + 1];
                $index += 2;
            }
            $toCompute[$date] = implode(":", $array);
        }

        return $toCompute;
    }

    public function getAllTime($data): array
    {
        // Extracting time from tag
        // "2024-07-24" => ['time', 'time']
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