<?php

class database {

    private $host ;
    private $username;
    private $password;
    private $name ;
    private $mysqli;

    function __construct() {
        $this->name ='gym';
        $this->password ='1234';
        $this->username ='root';
        $this->host ='localhost';


    }

    public function connection()
    {
        $this->mysqli = new mysqli('localhost','root','1234', 'gym');
        if ($this->mysqli->connect_error) {
            echo $this->mysqli->connect_error;
            return false;
        }
return true;
    }
    public function insert( $sql)
    {
        $this->connection();
        if (mysqli_query($this->mysqli, $sql)) {
            return true;
        } else {
            echo 'alo';
            return false;
        }
    }

    public function multiinsert( $sql)
    {
        $this->connection();
        if (mysqli_multi_query($this->mysqli, $sql)) {
            return true;
        } else {
            return false;
        }
    }
}
