<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract function tableName(): string;

    public function insertAndSave(): bool
    {
        $tableName = $this->tableName();
        $properties = array_keys($this->attributes());
        $attributes = implode(", ", $properties);
        $values = implode(", ", array_map(fn($value) => ":$value", $properties));
        $query = "INSERT INTO $tableName ($attributes) VALUES ($values)";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        foreach ($properties as $property) {
            $statement->bindValue(":$property", $this->{$property});
        }
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function fetchAll(): array
    {
        $tableName = $this->tableName();
        $query = "SELECT * FROM $tableName";
        $statement = Application::$application->database->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }
}