<?php

namespace Arrays\Writers;

use Arrays\DatabaseGateway;

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
        $sql = "INSERT INTO `arrays`(`name`, `array`) VALUES ('" . $name . "', '" . $jsonArray . "')";
        $this->conn->exec($sql);
    }

    function __destruct()
    {
        $this->dbGateway->closeConnection($this->conn);
    }
}