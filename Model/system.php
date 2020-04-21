<?php
include_once 'gym.php';
include_once 'database.php';
include_once 'branch.php';

class system
{
    private $gyms;

    function __construct()
    {
        $this->gyms = array();
    }

    public function getGyms()
    {
        return $this->gyms;
    }

    public function setGyms($gyms)
    {
        $this->gyms[] = $gyms;
    }

    public static function addGym($employee, $gymName, $branch)
    {
        $db = new database();
        $gymName = $db->getMysqli()->real_escape_string($gymName);
        $gym = new gym();
        $sql = "INSERT INTO gym (name) VALUE ('$gymName');";
        if ($db->insert($sql)) {
            $sql2 = "SELECT id FROM gym WHERE name = '" . $gymName . "';";
            $gid = $db->select($sql2);
            if ($gid != NULL) {
                $gym->setId($gid['id']);
                if ($gym->addBranch($branch)) {
                    if ($branch->addemployee($employee, '-1')) {
                        $sql3 = "UPDATE gym SET ownerId='" . $employee->getId() . "' WHERE id='" . $gym->getId() . "';";
                        if ($db->insert($sql3)) {
                            $db->closeconn();
                            return true;
                        }
                    }
                }
            }
        }
        //delete gym
        $db->closeconn();
        return false;
    }

    public function checkGymAvailability($gymname)
    {
        $db = new database();
        $gymname = $db->getMysqli()->real_escape_string($gymname);
        $ValidateSql = "select id  from gym where name='" . $gymname . "';";
        $gymnames = $db->select($ValidateSql);
        if ($gymnames != NULL) {
            $db->closeconn();
            return false;
        }
        $db->closeconn();
        return true;

    }

    public function deleteGym($id)
    {

    }

    public static function getGymdata($data)
    {
        $bId=$data['branchId'];
        $empId=$data['id'];
        $db = new database();
        $gym=new gym();
         if($bId==NULL)
        {
            $gymdataSql = "SELECT * FROM gym WHERE ownerId=".$empId;
            $gymdata=$db->select($gymdataSql);
            $gym->setId($gymdata['id']);
            $gym->setGymName($gymdata['name']);
        }
        else {
            $gymIdSql = "SELECT gymId FROM branch WHERE id=".$bId;
            $gymId=$db->select($gymIdSql);
            $gym->setId($gymId['gymId']);
            $gymdataSql = "SELECT name FROM gym WHERE id=".$gym->getId();
            $gymdata=$db->select($gymdataSql);
            $gym->setGymName($gymdata['name']);
        }
            $gym->getallbranches();
            $gym->getallpaymentmethod();
            $gym->getalldepartments();
            $gym->getallpackage();

        return $gym;
    }
}