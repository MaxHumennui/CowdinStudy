<?php

namespace Arrays;

use Symfony\Component\Dotenv\Dotenv;

class DatabaseGateway
{
    public function openConnection()
    {
        $dotenv = new Dotenv();
        $dotenv->overload(__DIR__ . "/../.env");

        $host = $_ENV["HOST"];
        $userName = $_ENV["USERNAME"];
        $password = $_ENV["PASSWORD"];
        $DB = $_ENV["DB"];

        try {
            $conn = new \PDO('mysql:host='. $host .';dbname='. $DB, $userName, $password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            die("Failed to connect: " . $e->getMessage());
        }

        return $conn;
    }

    public function closeConnection($conn)
    {
        $conn->close();
    }
}