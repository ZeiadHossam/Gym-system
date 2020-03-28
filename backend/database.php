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
		$this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->name);
        if ($this->mysqli->connect_error) {
            echo $this->mysqli->connect_error;
            return false;
        }
return true;
    }
    
    public function insert( $sql)
    {
        $this->connection();
		if (!$this->mysqli->query( $sql)) {
			echo $this->mysqli->error;
			$this->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function multiinsert( $sql)
    {
        $this->connection();
		if (!$this->mysqli->multi_query($sql)) {
			echo $this->mysqli->error;
			$this->mysqli->close();
			return false;
		} 
		else {
			$this->mysqli->close();
			return true;
		}
    }
}
