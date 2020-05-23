<?php
include_once 'Gym.php';
include_once 'Database.php';
include_once 'Branch.php';
include_once 'Notification.php';

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
        $gym = Gym::getInstance();
        $sql = "INSERT INTO gym (name,image) VALUE ('$gymName','$gymimage');";
        if ($db->insert($sql)) {

            if ($db->selectId($gym, "gym")) {

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

    public function checkGymActivity($branchId, $ownerId)
    {
        $db = new Database();
        if ($branchId == NULL) {
            $Activesql = "SELECT isActive FROM gym WHERE ownerId=" . $ownerId;
            $Activity = $db->select($Activesql);
            $isValid = $Activity['isActive'];
        } else {
            $branchDeletionSql = "SELECT isDeleted FROM branch WHERE id=" . $branchId;
            $branchDeletion = $db->select($branchDeletionSql);
            if ($branchDeletion['isDeleted'] == '0') {
                $userTypeDeletionSql = "SELECT type.isDeleted FROM type INNER JOIN employee ON employee.typeId=type.id WHERE employee.id=" . $ownerId;
                $userTypeDeletion = $db->select($userTypeDeletionSql);
                if ($userTypeDeletion['isDeleted'] == '0') {

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
            } else {
                $isValid = '0';
            }
        }
        if ($isValid == '1') {
            return true;
        } else {
            return false;
        }

    }

    public function checkGymAvailability($gymname)
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
        $gym = Gym::getInstance();
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
            foreach ($gym->getBranchs() as $branch) {
                $branch->getAllEmployees();
            }

        } else {
            $gym->getBranchs()[$data['branchId']]->getAllEmployees();

        }
        foreach ($gym->getBranchs() as $branch) {
            $branch->getAllMembers();
        }

        return $gym;
    }

    public function getrecentlyAddedContracts()
    {
        $db = new database();
        $todayDate = date("Y-m-d H:i:s");
        $maxDate = date('Y-m-d H:i:s', strtotime($todayDate . ' -  7 days'));
        $recentlyaddedSql = "SELECT *,contract.id as cid , member.id as memId FROM contract INNER JOIN packageperiod ON contract.packageId=packageperiod.id INNER JOIN packagetype ON packageperiod.packageTypeId=packagetype.id INNER JOIN member ON contract.memberId=member.id INNER JOIN person ON member.personId=person.id WHERE contract.isDeleted=0 AND contract.createdAt BETWEEN '" . $maxDate . "' AND '" . $todayDate . "';";
        $recentlyaddedData = $db->selectArray($recentlyaddedSql);
        $recentlyAddedContracts = array();
        while ($row = mysqli_fetch_assoc($recentlyaddedData)) {
            $contractData = array();
            $contractData['branchId'] = $row['branchId'];
            $contractData['memberId'] = $row['memId'];
            $contractData['contractId'] = $row['cid'];
            $contractData['memberName'] = $row['firstName'] . " " . $row['lastName'];
            $contractData['packageType'] = $row['name'];
            $contractData['packagePeriod'] = $row['period'] . " " . $row['type'];
            $contractData['due'] = $row['endDate'];
            $contractData['telephone'] = $row['mobilePhone'];
            $recentlyAddedContracts[] = $contractData;
        }
        return $recentlyAddedContracts;
    }

    public function getrecentlyExpiredContracts()
    {
        $db = new database();
        $todayDate = date("Y-m-d H:i:s");
        $maxDate = date('Y-m-d H:i:s', strtotime($todayDate . ' -  7 days'));
        $recentlyExpiredSql = "SELECT *,contract.id as cid , member.id as memId FROM contract INNER JOIN packageperiod ON contract.packageId=packageperiod.id INNER JOIN packagetype ON packageperiod.packageTypeId=packagetype.id INNER JOIN member ON contract.memberId=member.id INNER JOIN person ON member.personId=person.id WHERE contract.isDeleted=0 AND contract.endDate BETWEEN '" . $maxDate . "' AND '" . $todayDate . "';";
        $recentlyExpiredData = $db->selectArray($recentlyExpiredSql);
        $recentlyExpiredContracts = array();
        while ($row = mysqli_fetch_assoc($recentlyExpiredData)) {
            $contractData = array();
            $contractData['branchId'] = $row['branchId'];
            $contractData['memberId'] = $row['memId'];
            $contractData['contractId'] = $row['cid'];
            $contractData['memberName'] = $row['firstName'] . " " . $row['lastName'];
            $contractData['packageType'] = $row['name'];
            $contractData['packagePeriod'] = $row['period'] . " " . $row['type'];
            $contractData['due'] = $row['endDate'];
            $contractData['telephone'] = $row['mobilePhone'];
            $recentlyExpiredContracts[] = $contractData;
        }
        return $recentlyExpiredContracts;
    }

    public function getSalesReport($employeeId, $firstName, $lastName)
    {
        $db = new database();
        if(!isset($_SESSION))
        {
            session_start();
        }
        $data = array();
        $gym = unserialize($_SESSION['Gym']);
        $employeesSql = "SELECT employee.id,firstName,lastName,mobilePhone from employee INNER JOIN person ON employee.personId=person.id INNER JOIN branch ON person.branchId=branch.id INNER JOIN gym ON branch.gymID=gym.id WHERE person.isDeleted=0 AND gym.id=" . $gym->getId();
        if ($employeeId != NULL) {
            $employeesSql .= " AND employee.id='" . $employeeId . "'";
        }
        if ($firstName != NULL) {
            $employeesSql .= " AND person.firstName='" . $firstName . "'";
        }
        if ($lastName != NULL) {
            $employeesSql .= " AND person.lastName='" . $lastName . "'";
        }
        $employeesData = $db->selectArray($employeesSql);
        while ($row = mysqli_fetch_assoc($employeesData)) {
            $contractSql = "SELECT COUNT(contract.id) as totalContracts,SUM(totalAmount) as totalAm,SUM(amountPaid) as amPaid , SUM(amountDue) as amDue from contract INNER JOIN payment ON contract.paymentId=payment.id WHERE contract.isDeleted=0 AND sales=" . $row['id'];
            $contractData = $db->select($contractSql);
            $arraydata = array();
            $arraydata[] = $row['id'];
            $arraydata[] = $row['firstName'];
            $arraydata[] = $row['lastName'];
            $arraydata[] = $row['mobilePhone'];
            $arraydata[] = $contractData['totalContracts'];
            $arraydata[] = $contractData['totalAm'];
            $arraydata[] = $contractData['amPaid'];
            $arraydata[] = $contractData['amDue'];
            $lastContractSql = "SELECT createdAt FROM contract WHERE contract.isDeleted=0 AND sales=" . $row['id'] . " ORDER BY id DESC LIMIT 1;";
            $lastContractData = $db->select($lastContractSql);
            if (isset($lastContractData['createdAt'])&&isset($contractData['totalAm'])) {
                $lastContract = date("Y-m-d", strtotime($lastContractData['createdAt']));
                $arraydata[] = $lastContract;
                $data[] = $arraydata;

            }
        }
        return $data;
    }

    public function getContractsReport($contractId, $memberId, $firstName, $lastName, $packageType, $contractType, $memExpiresFrom, $memExpiresTo, $AddedFrom, $AddedTo)
    {
        $db = new database();
        if(!isset($_SESSION))
        {
            session_start();
        }
        $data = array();
        $gym = unserialize($_SESSION['Gym']);
        $membersSql = "SELECT member.id,firstName,lastName,mobilePhone,birthDay from member INNER JOIN person ON member.personId=person.id INNER JOIN branch ON person.branchId=branch.id INNER JOIN gym ON branch.gymID=gym.id WHERE person.isDeleted=0 AND gym.id=" . $gym->getId();
        if ($memberId != NULL) {
            $membersSql .= " AND member.id='" . $memberId . "'";
        }
        if ($firstName != NULL) {
            $membersSql .= " AND person.firstName='" . $firstName . "'";
        }
        if ($lastName != NULL) {
            $membersSql .= " AND person.lastName='" . $lastName . "'";
        }
        $membersData = $db->selectArray($membersSql);
        $todayDate = date("Y-m-d");
        $todayDatetime = strtotime($todayDate);

        while ($memberrow = mysqli_fetch_assoc($membersData)) {
            $contractSql = "SELECT contract.id,packagetype.name,packageperiod.period,packagetype.type,contract.startDate,contract.endDate,remainingPackagePeriod from contract INNER JOIN packageperiod ON contract.packageId=packageperiod.id INNER JOIN packagetype ON packageperiod.packageTypeId=packagetype.id  WHERE contract.isDeleted=0 AND memberId=" . $memberrow['id'];
            if ($contractId != NULL) {
                $contractSql .= " AND contract.id='" . $contractId . "'";
            }
            if ($packageType != NULL) {
                $contractSql .= " AND packagetype.id='" . $packageType . "'";
            }
            if ($contractType != NULL) {
                $contractSql .= " AND contract.packageId='" . $contractType . "'";
            }
            if ($memExpiresFrom != NULL) {
                if ($memExpiresTo != NULL) {
                    $contractSql .= " AND contract.endDate BETWEEN '" . $memExpiresFrom . "' AND '".$memExpiresTo."'";
                }
                else
                {
                    $contractSql .= " AND contract.endDate BETWEEN '" . $memExpiresFrom . "' AND '".$todayDate."'";

                }
            }
            if ($memExpiresTo != NULL) {
                if ($memExpiresFrom == NULL) {
                    $contractSql .= " AND contract.endDate BETWEEN '" . $todayDate . "' AND '".$memExpiresTo."'";
                }
            }
            if ($AddedFrom != NULL) {
                if ($AddedTo != NULL) {
                    $contractSql .= " AND contract.createdAt BETWEEN'" . $AddedFrom . "' AND '".$AddedTo."'";
                }
                else
                {
                    $contractSql .= " AND contract.createdAt BETWEEN'" . $AddedFrom . "' AND '".$todayDate."'";

                }
            }
            if ($AddedTo != NULL) {
                if ($AddedFrom == NULL) {

                    $contractSql .= " AND contract.createdAt BETWEEN'" . $todayDate . "' AND '".$AddedTo."'";
                }
            }

            $contractData = $db->selectArray($contractSql);
            while ($contractrow = mysqli_fetch_assoc($contractData)) {

                $arraydata = array();
                $arraydata[] = $memberrow['id'];
                $arraydata[] = $memberrow['firstName'];
                $arraydata[] = $memberrow['lastName'];
                $arraydata[] = $memberrow['mobilePhone'];
                $arraydata[] = $memberrow['birthDay'];
                $arraydata[] = $contractrow['id'];
                $arraydata[] = $contractrow['name'];
                $arraydata[] = $contractrow['period']." ".$contractrow['type'];
                $arraydata[] = $contractrow['startDate'];
                $arraydata[] = $contractrow['endDate'];
                $arraydata[] = $contractrow['remainingPackagePeriod']." ".$contractrow['type'];
                if($contractrow['remainingPackagePeriod']==0){
                    $arraydata[] = "Expired";
                }
                else if ($todayDatetime < strtotime($contractrow['startDate'])) {
                    $arraydata[] = "Not Started";
                } else if ($todayDatetime >= strtotime($contractrow['startDate']) && $todayDatetime <= strtotime($contractrow['endDate'])) {
                    $arraydata[] = "Active";
                } else if ($todayDatetime > strtotime($contractrow['endDate'])) {
                    $arraydata[] = "Expired";
                }
                if (isset($contractrow['id'])) {
                    $data[] = $arraydata;

                }
            }
        }

        return $data;
    }
    public function getAllNotifications()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $notifications=array();

        $gym = unserialize($_SESSION['Gym']);
        $todayDate = date("m-d");
        $todayDate = strtotime($todayDate);
        foreach ($gym->getBranchs() as $branch)
        {
            foreach ($branch->getMembers() as $member)
            {
                if (date('m-d') == substr($member->getBirthday(),5,5))
                {
                    $notification=new Notification();
                    $notification->setTitle("BirthDay");
                    $notification->setMessege("Today is the birthday of Member : '".$member->getFirstName()." ".$member->getLastName()."'");
                    $notifications[]=$notification;
                }
                foreach ($member->getContracts() as $contract)
                {
                    if (strtotime(date("Y-m-d"))>=strtotime($contract->getIssueDate())&&strtotime(date("Y-m-d"))<strtotime($contract->getEndDate()))
                    {
                        $notification=new Notification();
                        $notification->setTitle("Contract Expiry");
                        $notification->setMessege("Contract of ID : (".$contract->getId().") of Member : (".$member->getId().") '".$member->getFirstName()." ".$member->getLastName()."' is about to expire");
                        $notifications[]=$notification;
                    }
                }
            }
            foreach ($branch->getEmployees() as $employee)
            {
                if (date('m-d') == substr($employee->getBirthday(),5,5))
                {
                    $notification=new Notification();
                    $notification->setTitle("BirthDay");
                    $notification->setMessege("Today is the birthday of Employee : '".$employee->getFirstName()." ".$employee->getLastName()."'");
                    $notifications[]=$notification;
                }
            }
        }
        return $notifications;
    }
}