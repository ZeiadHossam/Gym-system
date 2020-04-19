<?php
include_once 'employee.php';

class branch
{
    private $id;
    private $city;
    private $members;
    private $address;
    private $employees;

    function __construct()
    {
        $this->members = array();
        $this->employees = array();
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getCity()
    {
        return $this->city;
    }


    public function setCity($city)
    {
        $this->city = $city;
    }


    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getEmployees()
    {
        return $this->employees;
    }


    public function setEmployees($employees)
    {
        $this->employees[] = $employees;
    }


    public function getMembers()
    {
        return $this->members;
    }

    public function setMembers($members)
    {
        $this->members[] = $members;
    }

    public function addemployee($employee, $Bid)
    {
        $db = new database();
        $employee->setUserName($db->getMysqli()->real_escape_string($employee->getUserName()));
        $employee->setPassword($db->getMysqli()->real_escape_string($employee->getPassword()));
        $employee->setEmail($db->getMysqli()->real_escape_string($employee->getEmail()));
        $employee->setFirstName($db->getMysqli()->real_escape_string($employee->getFirstName()));
        $employee->setLastName($db->getMysqli()->real_escape_string($employee->getLastName()));
        $employee->setImage($db->getMysqli()->real_escape_string($employee->getImage()));
        $employee->setHomePhone($db->getMysqli()->real_escape_string($employee->getHomePhone()));
        $employee->setMobilePhone($db->getMysqli()->real_escape_string($employee->getMobilePhone()));

        if($Bid=='-1') {
            $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,branchId) VALUES ('".$employee->getFirstName()."','".$employee->getLastName()."','".$employee->getBirthDay()."','".$employee->getImage()."','".$employee->getMobilePhone()."','".$employee->getHomePhone()."','".$employee->getGender()."','".$employee->getEmail()."','".$this->id."');";
        }
        else
        {
            $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,branchId) VALUES ('".$employee->getFirstName()."','".$employee->getLastName()."','".$employee->getBirthDay()."','".$employee->getImage()."','".$employee->getMobilePhone()."','".$employee->getHomePhone()."','".$employee->getGender()."','".$employee->getEmail()."','".$Bid."');";
        }
        if($db->insert($sql))
        {
            $personID = "SELECT id FROM person WHERE firstName='".$employee->getFirstName()."' AND lastName='".$employee->getLastName()."' AND mobilePhone='".$employee->getMobilePhone()."'";
            $sql2="INSERT INTO employee(personId,typeId,userName,password,dateAdded)VALUES(($personID),'".$employee->getUsertype()->getId()."','".$employee->getusername()."','".$employee->getpassword()."','".$employee->getdateadded()."');";
            if ($db->insert($sql2)) {
                if($employee->getIdFromDB()) {
                    $this->setEmployees($employee);
                    $db->closeconn();
                    return true;
                }
                else
                {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function getIdFromDB()
    {
        $db = new database();
        $sql2 = "SELECT id FROM branch WHERE city='".$this->city."' AND address='".$this->address."';";
       if($bid=$db->select($sql2)) {
           $this->setId($bid['id']);
           $db->closeconn();
            return true;
       }
       else
       {
           $db->closeconn();
           return false;
       }
   }
}