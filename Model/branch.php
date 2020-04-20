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
            $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email) VALUES ('".$employee->getFirstName()."','".$employee->getLastName()."','".$employee->getBirthDay()."','".$employee->getImage()."','".$employee->getMobilePhone()."','".$employee->getHomePhone()."','".$employee->getGender()."','".$employee->getEmail()."');";
        }
        else
        {
            $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,branchId) VALUES ('".$employee->getFirstName()."','".$employee->getLastName()."','".$employee->getBirthDay()."','".$employee->getImage()."','".$employee->getMobilePhone()."','".$employee->getHomePhone()."','".$employee->getGender()."','".$employee->getEmail()."','".$this->getId()."');";
        }
        if($db->insert($sql))
        {
            $personID = "SELECT id FROM person WHERE firstName='".$employee->getFirstName()."' AND lastName='".$employee->getLastName()."' AND mobilePhone='".$employee->getMobilePhone()."'";
            $sql2="INSERT INTO employee(personId,typeId,userName,password,dateAdded)VALUES(($personID),'".$employee->getUsertype()->getId()."','".$employee->getusername()."','".md5($employee->getpassword())."','".$employee->getdateadded()."');";
            if ($db->insert($sql2)) {
                if($db->selectId($employee,"employee")) {
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
    public function checkEmpDataAvailability($employee)
    {
        $db = new database();
        $employee->setUserName($db->getMysqli()->real_escape_string($employee->getUserName()));
        $usernamesql="select id  from employee where userName='".$employee->getUserName()."';";
        $usernames=$db->select($usernamesql);
        $employee->setEmail($db->getMysqli()->real_escape_string($employee->getEmail()));
        $emailsql="select id  from person where email='".$employee->getEmail()."';";
        $emails=$db->select($emailsql);
        $employee->setMobilePhone($db->getMysqli()->real_escape_string($employee->getMobilePhone()));
        $phonesql="select id  from person where mobilePhone='".$employee->getMobilePhone()."';";
        $phones=$db->select($phonesql);
        if($usernames!=NULL)
        {
            return '1';
        }

        elseif($emails!=NULL)
        {
            return '2';
        }
        elseif($phones!=NULL)
        {
            return '3';
        }
        else
        {
            return '0';
        }
    }
}