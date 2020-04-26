<?php
include_once 'employee.php';
include_once 'ICheckAvailability.php';

class branch implements ICheckAvailability
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


    public function setEmployees($empId,$employee)
    {
        $this->employees[$empId] = $employee;
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
        $createdAt = date("Y/m/d H:i:s");

        if ($Bid == '-1') {
            $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,createdAt) VALUES ('" . $employee->getFirstName() . "','" . $employee->getLastName() . "','" . $employee->getBirthDay() . "','" . $employee->getImage() . "','" . $employee->getMobilePhone() . "','" . $employee->getHomePhone() . "','" . $employee->getGender() . "','" . $employee->getEmail() . "','$createdAt');";
        } else {
            $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,createdAt,branchId) VALUES ('" . $employee->getFirstName() . "','" . $employee->getLastName() . "','" . $employee->getBirthDay() . "','" . $employee->getImage() . "','" . $employee->getMobilePhone() . "','" . $employee->getHomePhone() . "','" . $employee->getGender() . "','" . $employee->getEmail() . "','$createdAt','" . $this->getId() . "');";
        }
        if ($db->insert($sql)) {

            $personID="SELECT id FROM person ORDER BY id DESC LIMIT 1";
            $sql2 = "INSERT INTO employee(personId,typeId,userName,password)VALUES(($personID),'" . $employee->getUsertype()->getId() . "','" . $employee->getusername() . "','" . md5($employee->getpassword()) . "');";
            if ($db->insert($sql2)) {
                if ($db->selectId($employee, "employee")) {
                    $this->setEmployees($employee->getId(),$employee);

                    $db->closeconn();
                    return true;
                } else {
                    $db->closeconn();
                    return false;
                }
            } else {
                $db->closeconn();
                return false;
            }
        }
    }
    public function deleteEmployee($id)
    {
        $db = new database();
        $updatedAt=date("Y/m/d H:i:s");
        $sql="UPDATE person SET isDeleted=1, updatedAt='$updatedAt' WHERE id=".$id;
        if ($db->insert($sql))
        {

            $db->closeconn();
            return true;
        }
        return false;
    }
    public function getAllEmployees(){
        $db = new database();
        $employeeSql= "SELECT * , employee.id as emp_id  FROM employee INNER JOIN person ON employee.personId=person.id INNER JOIN type ON employee.typeId=type.id where person.isDeleted=0 AND type.isDeleted=0 AND person.branchId=".$this->getId();
        $employeedata = $db->selectArray($employeeSql);
        while ($row = mysqli_fetch_assoc($employeedata)) {
           $employee=new employee();
           $employee->setId($row['emp_id']);
           $employee->setFirstName($row['firstName']);
           $employee->setLastName($row['lastName']);
           $employee->setImage($row['image']);
           $employee->setHomePhone($row['homePhone']);
           $employee->setMobilePhone($row['mobilePhone']);
           $employee->setEmail($row['email']);
           $employee->setBirthday($row['birthDay']);
           $employee->setGender($row['gender']);
           $employee->getUsertype()->setId($row['typeId']);
           $employee->getUsertype()->setName($row['name']);
           $pagesSql="SELECT * , pages.id as page_id FROM  privilege INNER JOIN pages ON privilege.pageId=pages.id WHERE privilege.typeId=".$row['typeId'];
           $employeeprivilege = $db->selectArray($pagesSql);
            while ($row3 = mysqli_fetch_assoc($employeeprivilege)) {
                $page = new page();
                $page->set_id($row3['page_id']);
                $page->set_name($row3['pageName']);
                $page->set_access($row3['hasAccess']);
                $employee->getUsertype()->setPages($page->get_id(),$page);
            }
                $this->setEmployees($employee->getId(),$employee);
        }

    }

    public function checkifavailable($gymId)
    {
        $db = new database();
        $this->setCity($db->getMysqli()->real_escape_string($this->getCity()));
        $this->setAddress($db->getMysqli()->real_escape_string($this->getAddress()));
        if ($this->getId() != NULL) {
            $branchsql = "select id  from branch where NOT id=" . $this->getId() . " AND isDeleted=0 AND gymId=$gymId AND address='" . $this->getAddress() . "' AND city='" . $this->getCity() . "';";
        } else {
            $branchsql = "select id  from branch where  isDeleted=0 AND gymId=$gymId AND address='" . $this->getAddress() . "' AND city='" . $this->getCity() . "';";

        }
        $branches = $db->select($branchsql);
        if ($branches != NULL) {
            $db->closeconn();
            return '1';
        }
        $db->closeconn();
        return '0';
    }

}