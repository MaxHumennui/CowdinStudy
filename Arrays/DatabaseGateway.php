<?php

namespace Arrays;

class DatabaseGateway
{
    public function openConnection()
    {
        $host = "localhost:8001";
        $userName = "root";
        $password = "";
        $DB = "Crowdin";

        $conn = new \PDO('mysql:host='. $host .';dbname='. $DB, $userName, $password)
        or die("Connection failed : %s\n". $conn->errorCode());

        return $conn;
    }

    public function closeConnection($conn)
    {
        $conn->close();
    }
}