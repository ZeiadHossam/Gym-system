<?php

class Database {

    private $host ;
    private $username;
    private $password;
    private $name ;
    private $mysqli;


    public function getMysqli()
    {
        return $this->mysqli;
    }

    function __construct() {
        $this->name ='gym';
        $this->password ='';
        $this->username ='root';
        $this->host ='localhost';
        $this->connection();

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

		if (!$this->mysqli->query($sql)) {
		
			echo $this->mysqli->error;

            return false;
        } else {

            return true;
        }
    }

    public function multiinsert( $sql)
    {

		if (!$this->mysqli->multi_query($sql)) {
			echo $this->mysqli->error;

			return false;
		} 
		else {

			return true;
		}
    }
    public function select($query)
	{

		$result = mysqli_query($this->mysqli,$query);
		if (!$result) {
			printf("Error: %s\n", $this->mysqli->error);
            echo $query;
			exit();
		}
		$row=mysqli_fetch_assoc($result);
		if (!empty($row)) {

			return $row;

		} else {

			return NULL;
		}
	}public function selectArray($query)
	{

		$result = mysqli_query($this->mysqli,$query);
		if (!$result) {
			printf("Error: %s\n", $this->mysqli->error);
            echo $query;
			exit();
		}
		return $result;
	}
	public function selectId($object,$tablename)
	{
        $query="SELECT id FROM ".$tablename." ORDER BY id DESC LIMIT 1";
        if($row=$this->select($query))
        {
            $object->setId($row['id']);
            return true;
        }
        else
        {
            return false;
        }
	}
	public function closeconn()
    {
        $this->mysqli->close();
    }
}
