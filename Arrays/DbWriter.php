<?php

namespace Arrays;

class DbWriter implements WriterInterface
{
    function __construct(DatabaseGateway $dbGateway)
    {
        $this->dbGateway = $dbGateway;
        $this->conn = $dbGateway->openConnection();
    }

    private $dbGateway;
    private $conn;

    public function write($name, $array)
    {
        $jsonArray = json_encode($array);
        $this->conn->exec("INSERT INTO 'arrays' VALUES (" . $name . ", " . $jsonArray . ")");
    }

    function __destruct()
    {
        $this->dbGateway->closeConnection($this->conn);
    }
}