<?php
include_once 'Gym.php';
include_once 'Database.php';
include_once 'Branch.php';

class System
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

    public static function addGym($employee, $gymName, $branch, $gymimage)
    {

        $db = new Database();
        $gymName = $db->getMysqli()->real_escape_string($gymName);
        $gymimage = $db->getMysqli()->real_escape_string($gymimage);
        $gym = new Gym();
        $sql = "INSERT INTO gym (name,image) VALUE ('$gymName','$gymimage');";
        if ($db->insert($sql)) {

            if ($db->selectId($gym,"gym")) {

                if ($gym->addDepartment($employee->getUserType())) {

                    if ($db->selectId($employee->getUserType(), "type")) {
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
            }
        }
        //delete gym
        $db->closeconn();
        return false;
    }
    public  function checkGymActivity($branchId,$ownerId)
    {
        $db = new Database();
        if ($branchId==NULL)
        {
            $Activesql = "SELECT isActive FROM gym WHERE ownerId=" . $ownerId;
            $Activity = $db->select($Activesql);
            $isValid=$Activity['isActive'];
        }
        else {
            $branchDeletionSql = "SELECT isDeleted FROM branch WHERE id=" . $branchId;
            $branchDeletion = $db->select($branchDeletionSql);
            if ($branchDeletion['isDeleted']=='0') {
                $gymIdSql = "SELECT gymId FROM branch WHERE id=" . $branchId;
                $gymId = $db->select($gymIdSql);
                $Activesql = "SELECT isActive FROM gym WHERE id=" . $gymId['gymId'];
                $Activity = $db->select($Activesql);
                $isValid = $Activity['isActive'];
            }
            else
            {
                $isValid='0';
            }
        }
        if ($isValid=='1')
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public  function checkGymAvailability($gymname)
    {
        $db = new Database();
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
        $bId = $data['branchId'];
        $empId = $data['id'];
        $db = new database();
        $gym = new Gym();
        if ($bId == NULL) {
            $gymdataSql = "SELECT * FROM gym WHERE ownerId=" . $empId;
            $gymdata = $db->select($gymdataSql);
            $gym->setId($gymdata['id']);
            $gym->setGymName($gymdata['name']);
            $gym->setGymImage($gymdata['image']);
        } else {
            $gymIdSql = "SELECT gymId FROM branch WHERE id=" . $bId;
            $gymId = $db->select($gymIdSql);
            $gym->setId($gymId['gymId']);
            $gymdataSql = "SELECT * FROM gym WHERE id=" . $gym->getId();
            $gymdata = $db->select($gymdataSql);
            $gym->setGymName($gymdata['name']);
            $gym->setGymImage($gymdata['image']);

        }
        $gym->getOwnerDetails();
        $gym->getallbranches();
        $gym->getallpaymentmethod();
        $gym->getalldepartments();
        $gym->getallpackage();
        if ($bId == NULL) {
            foreach ($gym->getBranchs() as $branch){
                $branch->getAllEmployees();
            }

        }
        else{
            $gym->getBranchs()[$data['branchId']]->getAllEmployees();

        }
        foreach ($gym->getBranchs() as $branch){
            $branch->getAllMembers();
        }

        return $gym;
    }
    public function getrecentlyAddedContracts()
    {
        $db = new database();
        $todayDate = date("Y-m-d H:i:s");
        $maxDate=date('Y-m-d H:i:s', strtotime($todayDate . ' -  7 days'));
        $recentlyaddedSql="SELECT *,contract.id as cid , member.id as memId FROM contract INNER JOIN packageperiod ON contract.packageId=packageperiod.id INNER JOIN packagetype ON packageperiod.packageTypeId=packageType.id INNER JOIN member ON contract.memberId=member.id INNER JOIN person ON member.personId=person.id WHERE contract.isDeleted=0 AND contract.createdAt BETWEEN '" . $maxDate . "' AND '".$todayDate."';";
        $recentlyaddedData = $db->selectArray($recentlyaddedSql);
        $recentlyAddedContracts=array();
        while ($row = mysqli_fetch_assoc($recentlyaddedData)) {
            $contractData=array();
            $contractData['branchId']=$row['branchId'];
            $contractData['memberId']=$row['memId'];
            $contractData['contractId']=$row['cid'];
            $contractData['memberName']=$row['firstName']." ".$row['lastName'];
            $contractData['packageType']=$row['name'];
            $contractData['packagePeriod']=$row['period']." ".$row['type'];
            $contractData['due']=$row['endDate'];
            $contractData['telephone']=$row['mobilePhone'];
            $recentlyAddedContracts[]=$contractData;
        }
        return $recentlyAddedContracts;
    }
    public function getrecentlyExpiredContracts()
    {
        $db = new database();
        $todayDate = date("Y-m-d H:i:s");
        $maxDate=date('Y-m-d H:i:s', strtotime($todayDate . ' -  7 days'));
        $recentlyExpiredSql="SELECT *,contract.id as cid , member.id as memId FROM contract INNER JOIN packageperiod ON contract.packageId=packageperiod.id INNER JOIN packagetype ON packageperiod.packageTypeId=packageType.id INNER JOIN member ON contract.memberId=member.id INNER JOIN person ON member.personId=person.id WHERE contract.isDeleted=0 AND contract.endDate BETWEEN '" . $maxDate . "' AND '".$todayDate."';";
        $recentlyExpiredData = $db->selectArray($recentlyExpiredSql);
        $recentlyExpiredContracts=array();
        while ($row = mysqli_fetch_assoc($recentlyExpiredData)) {
            $contractData=array();
            $contractData['branchId']=$row['branchId'];
            $contractData['memberId']=$row['memId'];
            $contractData['contractId']=$row['cid'];
            $contractData['memberName']=$row['firstName']." ".$row['lastName'];
            $contractData['packageType']=$row['name'];
            $contractData['packagePeriod']=$row['period']." ".$row['type'];
            $contractData['due']=$row['endDate'];
            $contractData['telephone']=$row['mobilePhone'];
            $recentlyExpiredContracts[]=$contractData;
        }
        return $recentlyExpiredContracts;
    }
}