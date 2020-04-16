<?php
include_once 'database.php';
include_once 'person.php';
include_once 'usertype.php';

class employee extends person
{
	private $usertype;
	private $username;
	private $password;
	private $dateadded;
	private $privateid;

	function __construct()
	{

		$this->usertype = new usertype();
	}
    public function setusertype($usertype)
    {
        $this->usertype = $usertype;
    }


    public function getusertype()
    {
        return $this->usertype;
    }
    public function setusername($username)
    {
        $this->username = $username;
    }


    public function getusername()
    {
        return $this->username;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }


    public function getpassword()
    {
        return $this->password;
    }
    public function setdateadded($dateadded)
    {
        $this->dateadded = $dateadded;
    }


    public function getdateadded()
    {
        return $this->dateadded;
    }
    public function setprivateid($privateid)
    {
        $this->privateid = $privateid;
    }


    public function getprivateid()
    {
        return $this->privateid;
    }

    public function addemployee()
    {
        session_start();
        $db = new database();
        $pid = "SELECT personId FROM employee WHERE id=" . $_SESSION['id'];
        $gymId = "SELECT branchId FROM person WHERE person.id=($pid)";
        $rows = $db->select($gymId);
        $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,branchId)
		VALUES ('".$this->getFirstName()."','".$this->getLastName()."','".$this->getBirthDay()."','".$this->getImage()."','".$this->getMobilePhone()."','".$this->getHomePhone()."','".$this->getGender()."','".$this->getEmail()."','".$rows['branchId']."');";
        $personID = "SELECT id FROM person WHERE firstName='".$this->getFirstName()."' AND lastName='".$this->getLastName()."' AND mobilePhone='".$this->getMobilePhone()."'";
        $typeid   = "SELECT id FROM type WHERE name='".$this->getusertype()."'";
        $sql .="INSERT INTO employee(personId,typeId,userName,password,dateAdded)VALUES(($personID),($typeid),'".$this->getusername()."','".$this->getpassword()."','".$this->getdateadded()."');";
        if ($db->multiinsert($sql)) {

            return true;
        } else {

            return false;
        }
    }

   

	public static function login($username,$password)
	{
		$query="SELECT id FROM employee WHERE userName='".$username."' AND password= '".$password."';";
		$db = new database();
		$row = $db->select($query);

		if ($row != NULL) {

			$_SESSION['id'] = $row['id'];
			return true;
		} else {
			return FALSE;

		}
	}

	
}
