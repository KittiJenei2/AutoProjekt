<?php
class CarDbTools 
{
    private $mysqli;

    function __construct($host = 'localhost', $user = 'root', $password = null, $db = 'cars')
    {
        $this->mysqli = new mysqli($host, $user, $password, $db);
        if (this->mysqli->connect_errno)
        {
            throw new Exception($this->mysqli->connect_errno);
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    function CreateMaker($maker)
    {
        $result =$this->mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
        if (!$result)
        {
            echo "Hiba történt a $maker beszúrása közben";
        }
        return $result;
    }
}

