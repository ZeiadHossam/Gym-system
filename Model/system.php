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

    public static function addGym($employee, $gymName, $branchCity, $branchAddress)
    {
        $db = new database();

        $ValidateSql="select id  from gym where name='".$gymName."';";
        $gymnames=$db->select($ValidateSql);
        if($gymnames!=NULL)
        {
            return false;
        }
        $gym = new gym();
        $branch = new branch();
        $branch->setCity($branchCity);
        $branch->setAddress($branchAddress);
        $gymName = $db->getMysqli()->real_escape_string($gymName);
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
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteGym($id)
    {

    }

    public function getGymsInfo()
    {

    }
}