<?php
include_once 'Employee.php';
include_once 'Member.php';
include_once 'ICheckAvailability.php';

class Branch implements ICheckAvailability
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


    public function setEmployees($empId, $employee)
    {
        $this->employees[$empId] = $employee;
    }

    public function setAllEmployees($employees)
    {
        $this->employees = $employees;
    }


    public function getMembers()
    {
        return $this->members;
    }

    public function setMembers($memId,$members)
    {
        $this->members[$memId] = $members;
    }
    public function setAllMembers($members)
    {
        $this->members = $members;
    }

    public function addemployee($employee, $Bid)
    {
        $db = new Database();
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

                $query="SELECT id FROM person ORDER BY id DESC LIMIT 1";
                if($row=$db->select($query)) {
                    $employee->setPid($row['id']);
                $sql2 = "INSERT INTO employee(personId,typeId,userName,password)VALUES('".$employee->getPid()."','" . $employee->getUsertype()->getId() . "','" . $employee->getusername() . "','" . md5($employee->getpassword()) . "');";
                if ($db->insert($sql2)) {
                    if ($db->selectId($employee, "employee")) {
                        $this->setEmployees($employee->getId(), $employee);

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
    }
    public function editEmployee($id,$newBranchID)
    {
        $db = new Database();
        $this->employees[$id]->setEmail($db->getMysqli()->real_escape_string($this->employees[$id]->getEmail()));
        $this->employees[$id]->setFirstName($db->getMysqli()->real_escape_string($this->employees[$id]->getFirstName()));
        $this->employees[$id]->setLastName($db->getMysqli()->real_escape_string($this->employees[$id]->getLastName()));
        $this->employees[$id]->setImage($db->getMysqli()->real_escape_string($this->employees[$id]->getImage()));
        $this->employees[$id]->setHomePhone($db->getMysqli()->real_escape_string($this->employees[$id]->getHomePhone()));
        $this->employees[$id]->setMobilePhone($db->getMysqli()->real_escape_string($this->employees[$id]->getMobilePhone()));
        $updatedAt = date("Y/m/d H:i:s");

        $sql="UPDATE person SET firstName='".$this->employees[$id]->getFirstName()."' , lastName='".$this->employees[$id]->getLastName()."',birthDay='".$this->employees[$id]->getBirthday()."', ";
        $sql.="image='".$this->employees[$id]->getImage()."' , mobilePhone='".$this->employees[$id]->getMobilePhone()."',homePhone='".$this->employees[$id]->getHomePhone()."', ";
        $sql.="gender='".$this->employees[$id]->getGender()."' , email='".$this->employees[$id]->getEmail()."',updatedAt='".$updatedAt."' ,branchId='".$newBranchID."'WHERE id=".$this->employees[$id]->getPid()."; ";

        if ($db->insert($sql)) {
                $sql2="UPDATE employee SET typeId=".$this->employees[$id]->getUsertype()->getId()." WHERE id=".$this->employees[$id]->getId().";";
                if ($db->insert($sql2)) {
                        $db->closeconn();
                        return true;
                } else {
                    $db->closeconn();
                    return false;
                }
            }
        else {
            $db->closeconn();
            return false;
        }

    }
    public function deleteEmployee($id)
    {
        $db = new Database();
        $updatedAt = date("Y/m/d H:i:s");
        $sql = "UPDATE person SET isDeleted=1, updatedAt='$updatedAt' WHERE id=" . $id;
        if ($db->insert($sql)) {

            $db->closeconn();
            return true;
        }
        return false;
    }

    public function getAllEmployees()
    {
        $db = new Database();
        $employeeSql = "SELECT * , employee.id as emp_id,person.id as personId  FROM employee INNER JOIN person ON employee.personId=person.id INNER JOIN type ON employee.typeId=type.id where person.isDeleted=0 AND type.isDeleted=0 AND person.branchId=" . $this->getId();
        $employeedata = $db->selectArray($employeeSql);
        while ($row = mysqli_fetch_assoc($employeedata)) {
            $employee = new Employee();
            $employee->setPid($row['personId']);
            $employee->setId($row['emp_id']);
            $employee->setFirstName($row['firstName']);
            $employee->setLastName($row['lastName']);
            $employee->setUserName($row['userName']);
            $employee->setImage($row['image']);
            $employee->setHomePhone($row['homePhone']);
            $employee->setMobilePhone($row['mobilePhone']);
            $employee->setEmail($row['email']);
            $employee->setBirthday($row['birthDay']);
            $employee->setGender($row['gender']);
            $employee->getUsertype()->setId($row['typeId']);
            $employee->getUsertype()->setName($row['name']);
            $pagesSql = "SELECT * , pages.id as page_id FROM  privilege INNER JOIN pages ON privilege.pageId=pages.id WHERE privilege.typeId=" . $row['typeId'];
            $employeeprivilege = $db->selectArray($pagesSql);
            while ($row3 = mysqli_fetch_assoc($employeeprivilege)) {
                $page = new Page();
                $page->set_id($row3['page_id']);
                $page->set_name($row3['pageName']);
                $page->set_access($row3['hasAccess']);
                $employee->getUsertype()->setPages($page->get_id(), $page);
            }
            $this->setEmployees($employee->getId(), $employee);
        }

    }
    public  function  addMember($member){
        $db = new Database();
        $member->setEmail($db->getMysqli()->real_escape_string($member->getEmail()));
        $member->setFirstName($db->getMysqli()->real_escape_string($member->getFirstName()));
        $member->setLastName($db->getMysqli()->real_escape_string($member->getLastName()));
        $member->setImage($db->getMysqli()->real_escape_string($member->getImage()));
        $member->setHomePhone($db->getMysqli()->real_escape_string($member->getHomePhone()));
        $member->setMobilePhone($db->getMysqli()->real_escape_string($member->getMobilePhone()));
        $member->setWorkPhone($db->getMysqli()->real_escape_string($member->getWorkPhone()));
        $member->setAddress($db->getMysqli()->real_escape_string($member->getAddress()));
        $member->setFaxNumber($db->getMysqli()->real_escape_string($member->getFaxNumber()));
        $member->setCompanyName($db->getMysqli()->real_escape_string($member->getCompanyName()));
        $member->setCompanyAddress($db->getMysqli()->real_escape_string($member->getCompanyAddress()));
        $member->setEmergencyNumber($db->getMysqli()->real_escape_string($member->getEmergencyNumber()));
        $createdAt = date("Y/m/d H:i:s");

        $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,createdAt,branchId) VALUES ('" . $member->getFirstName() . "','" . $member->getLastName() . "','" . $member->getBirthDay() . "','" . $member->getImage() . "','" . $member->getMobilePhone() . "','" . $member->getHomePhone() . "','" . $member->getGender() . "','" . $member->getEmail() . "','$createdAt','" . $this->getId() . "');";

        if ($db->insert($sql)) {

            $query="SELECT id FROM person ORDER BY id DESC LIMIT 1";
            if($row=$db->select($query)) {
                $member->setPid($row['id']);
                $sql2 = "INSERT INTO member(personId,address,marriedStatus,emergencyNumber,companyName,workPhone,faxNumber,companyAddress,addedBy)VALUES('".$member->getPid()."','" . $member->getAddress() . "','" . $member->getMarriedStatus() . "','" . $member->getEmergencyNumber() . "', ' " .$member->getCompanyName()."', ' " .$member->getWorkPhone()."',' " .$member->getFaxNumber()."',' " .$member->getCompanyAddress()."',' " .$_SESSION['id']."');";
                if ($db->insert($sql2)) {
                    if ($db->selectId($member, "member")) {
                        $this->setMembers($member->getId(), $member);

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

    }
    public function editMember($id,$newBranchID)
    {
        $db = new Database();
        $this->members[$id]->setEmail($db->getMysqli()->real_escape_string($this->members[$id]->getEmail()));
        $this->members[$id]->setFirstName($db->getMysqli()->real_escape_string($this->members[$id]->getFirstName()));
        $this->members[$id]->setLastName($db->getMysqli()->real_escape_string($this->members[$id]->getLastName()));
        $this->members[$id]->setImage($db->getMysqli()->real_escape_string($this->members[$id]->getImage()));
        $this->members[$id]->setHomePhone($db->getMysqli()->real_escape_string($this->members[$id]->getHomePhone()));
        $this->members[$id]->setMobilePhone($db->getMysqli()->real_escape_string($this->members[$id]->getMobilePhone()));
        $this->members[$id]->setAddress($db->getMysqli()->real_escape_string($this->members[$id]->getAddress()));
        $this->members[$id]->setMarriedStatus($db->getMysqli()->real_escape_string($this->members[$id]->getMarriedStatus()));
        $this->members[$id]->setCompanyName($db->getMysqli()->real_escape_string($this->members[$id]->getCompanyName()));
        $this->members[$id]->setCompanyAddress($db->getMysqli()->real_escape_string($this->members[$id]->getCompanyAddress()));
        $this->members[$id]->setFaxNumber($db->getMysqli()->real_escape_string($this->members[$id]->getFaxNumber()));
        $this->members[$id]->setEmergencyNumber($db->getMysqli()->real_escape_string($this->members[$id]->getEmergencyNumber()));
        $this->members[$id]->setWorkPhone($db->getMysqli()->real_escape_string($this->members[$id]->getWorkPhone()));
        $this->members[$id]->setAddedBy($db->getMysqli()->real_escape_string($this->members[$id]->getAddedBy()));

        $updatedAt = date("Y/m/d H:i:s");

        $sql="UPDATE person SET firstName='".$this->members[$id]->getFirstName()."' , lastName='".$this->members[$id]->getLastName()."',birthDay='".$this->members[$id]->getBirthday()."', ";
        $sql.="image='".$this->members[$id]->getImage()."' , mobilePhone='".$this->members[$id]->getMobilePhone()."',homePhone='".$this->members[$id]->getHomePhone()."', ";
        $sql.="gender='".$this->members[$id]->getGender()."' , email='".$this->members[$id]->getEmail()."',updatedAt='".$updatedAt."' ,branchId='".$newBranchID."'WHERE id=".$this->members[$id]->getPid()."; ";

        if ($db->insert($sql)) {
            $sql2="UPDATE member SET  address='".$this->members[$id]->getAddress()."' , marriedStatus='".$this->members[$id]->getMarriedStatus()."',  emergencyNumber='".$this->members[$id]->getEmergencyNumber()."',companyName='".$this->members[$id]->getCompanyAddress()."',workPhone='".$this->members[$id]->getWorkPhone()."',faxNumber='".$this->members[$id]->getFaxNumber()."',companyAddress='".$this->members[$id]->getCompanyAddress()."' WHERE personId=".$this->members[$id]->getPid().";";
            if ($db->insert($sql2)) {
                $db->closeconn();
                return true;
            } else {
                $db->closeconn();
                return false;
            }
        }
        else {
            $db->closeconn();
            return false;
        }

    }
    public function deleteMember($id)
    {
        $db = new Database();
        $updatedAt = date("Y/m/d H:i:s");
        $sql = "UPDATE person SET isDeleted=1, updatedAt='$updatedAt' WHERE id=" . $this->members[$id]->getPid();
        if ($db->insert($sql)) {

            $db->closeconn();
            return true;
        }
        return false;
    }
    public function getAllMembers()
    {
        $db = new Database();
        $memberSql = "SELECT * , member.id as mem_id,person.id as personId  FROM member INNER JOIN person ON member.personId=person.id where person.isDeleted=0  AND person.branchId=" . $this->getId();
        $memberdata = $db->selectArray($memberSql);
        while ($row = mysqli_fetch_assoc($memberdata)) {
            $member = new Member();
            $member->setPid($row['personId']);
            $member->setId($row['mem_id']);
            $member->setFirstName($row['firstName']);
            $member->setLastName($row['lastName']);
            $member->setImage($row['image']);
            $member->setHomePhone($row['homePhone']);
            $member->setMobilePhone($row['mobilePhone']);
            $member->setEmail($row['email']);
            $member->setBirthday($row['birthDay']);
            $member->setGender($row['gender']);
            $member->setAddress($row['address']);
            $member->setMarriedStatus($row['marriedStatus']);
            $member->setEmergencyNumber($row['emergencyNumber']);
            $member->setCompanyName($row['companyName']);
            $member->setWorkPhone($row['workPhone']);
            $member->setFaxNumber($row['faxNumber']);
            $member->setCompanyAddress($row['companyAddress']);
            $addedBySql = "SELECT person.firstName,person.lastName  FROM person INNER JOIN employee ON employee.personId=person.id where employee.id=".$row['addedBy'];
            $addedByData=$db->select($addedBySql);
            $member->setAddedBy($addedByData['firstName']." ".$addedByData['lastName']);
            $member->getAllContracts();
            $this->setMembers($member->getId(), $member);
        }
    }
    public function checkifavailable($gymId)
    {
        $db = new Database();
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