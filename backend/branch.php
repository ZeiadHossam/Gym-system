<?php

include_once 'database.php';
class branch
{
    private $id;
    private $name;
    private $address;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function addbranch()
    {
		session_start();
        $db = new database();
        $pid="SELECT personId FROM employee WHERE id=".$_SESSION['id'];
		$gymId="SELECT gymId FROM person INNER JOIN branch ON person.branchId = branch.id WHERE person.id=($pid)";
		$rows=$db->select($gymId);
		$sql="INSERT INTO branch(branchName,address,gymId)VALUES ('".$this->name."','".$this->address."','".$rows['gymId']."');";
		
		if ($db->insert($sql)) {
            return true;
        }
        else{
        return false;
        }

    }
}