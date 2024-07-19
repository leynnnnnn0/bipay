<?php

class M0002_addColumnGender
{
    public function up()
    {
        $query = "ALTER TABLE employees ADD COLUMN gender VARCHAR(255) NOT NULL AFTER dateOfBirth";
        $database = app\core\Application::$application->database;
        $statement = $database->pdo->prepare($query);
        $statement->execute();
    }

    public function down()
    {

    }
}