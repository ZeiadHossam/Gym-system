<?php
include_once 'person.php';
include_once 'database.php';
include_once 'userType.php';

class employee extends person
{
    private $id;
    private $userName;
    private $password;
    private $usertype;

    function __construct()
    {
        $this->usertype = new usertype();
    }
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getUserName()
    {
        return $this->userName;
    }


    public function setUserName($userName)
    {
        $this->userName = $userName;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

    public function getUsertype()
    {
        return $this->usertype;
    }
    public function setUsertype($usertype)
    {
        $this->usertype = $usertype;
    }
    public function getIdFromDB()
    {
        $db = new database();
        $sql2 = "SELECT id FROM employee WHERE userName='".$this->userName."';";
        if($eid=$db->select($sql2)) {
            $this->setId($eid['id']);
            $db->closeconn();
            return true;
        }
        else
        {
            $db->closeconn();
            return false;
        }
    }
    public static function login($username,$password)
    {
        $query="SELECT employee.id,branchId FROM employee INNER JOIN person ON person.id=employee.personId WHERE userName='".$username."' AND password= '".$password."';";
        $db = new database();
        $row = $db->select($query);

        if ($row != NULL) {
            $db->closeconn();
            return $row;
         } else {
            $db->closeconn();
            return NULL;

        }
    }

    public function checkusernameifavailable()
    {
        $db = new database();
        $this->setUserName($db->getMysqli()->real_escape_string($this->getUserName()));
        $usernamesql="select id  from employee where userName='".$this->getUserName()."';";
        $usernames=$db->select($usernamesql);
        if($usernames!=NULL)
        {
            $db->closeconn();
            return False;
        }

        $db->closeconn();
            return TRUE;



    }

}