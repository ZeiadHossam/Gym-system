<?php
include_once 'branch.php';
include_once 'paymentmethod.php';
include_once 'package.php';
include_once 'packagePeriod.php';
include_once 'usertype.php';
include_once 'page.php';
include_once 'employee.php';

class gym
{

    public function getGymImage()
    {
        return $this->gymImage;
    }


    public function setGymImage($gymImage)
    {
        $this->gymImage = $gymImage;
    }

    private $id;
    private $gymName;
    private $gymImage;
    private $branches;
    private $userTypes;
    private $paymentMethods;
    private $packages;
    private $owner;

    function __construct()
    {
        $this->branches = array();
        $this->userTypes = array();
        $this->packages = array();
        $this->paymentMethods = array();
        $this->owner=new employee();
    }

    
    public function getOwner()
    {
        return $this->owner;
    }


    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getGymName()
    {
        return $this->gymName;
    }

    public function setGymName($gymName)
    {
        $this->gymName = $gymName;
    }

    public function getBranchs()
    {
        return $this->branches;
    }

    public function setBranchs($BID, $branchs)
    {
        $this->branches[$BID] = $branchs;
    }
    public function setAllBranchs($branchs)
    {
        $this->branches = $branchs;
    } public function setAlldepartments($departments)
    {
        $this->userTypes = $departments;
    }

        public function getUserTypes()
    {
        return $this->userTypes;
    }

    public function setUserTypes($uid, $userTypes)
    {
        $this->userTypes[$uid] = $userTypes;
    }

    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    public function setPaymentMethods($PmID, $paymentMethods)
    {
        $this->paymentMethods[$PmID] = $paymentMethods;
    }
    public function setAllPaymentMethods($paymentMethods)
    {
        $this->paymentMethods = $paymentMethods;
    }

    public function getPackages()
    {
        return $this->packages;
    }

    public function setPackages($packageid, $packages)
    {
        $this->packages[$packageid] = $packages;
    }
    public function setAllPackages($packages)
    {
        $this->packages = $packages;
    }

    public function addBranch($branch)
    {

        $db = new database();
        $branch->setCity($db->getMysqli()->real_escape_string($branch->getCity()));
        $branch->setAddress($db->getMysqli()->real_escape_string($branch->getAddress()));
        $createdAt=date("Y/m/d H:i:s");
        $sql = "INSERT INTO branch (city,address,gymId,createdAt) VALUES ('" . $branch->getCity() . "','" . $branch->getAddress() . "','" . $this->id . "','$createdAt')";
        if ($db->insert($sql)) {


            if ($db->selectId($branch, "branch")) {

                $this->setBranchs($branch->getId(), $branch);
                $_SESSION['Gym'] = serialize($this);
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

    public function editBranch($id)
    {
        $db = new database();
        $updatedAt=date("Y/m/d H:i:s");
        $this->getBranchs()[$id]->setCity($db->getMysqli()->real_escape_string($this->getBranchs()[$id]->getCity()));
        $this->getBranchs()[$id]->setAddress($db->getMysqli()->real_escape_string($this->getBranchs()[$id]->getAddress()));
        $sql = "UPDATE branch SET updatedAt='$updatedAt' , city='" . $this->getBranchs()[$id]->getCity() . "' , address='" . $this->getBranchs()[$id]->getAddress() . "' WHERE id=" . $this->getBranchs()[$id]->getId();
        if ($db->insert($sql)) {
            $_SESSION['Gym'] = serialize($this);
            $db->closeconn();
            return true;
        } else {
            $db->closeconn();
            return false;
        }

    }
    public function deleteBranch($id)
    {
        $db = new database();
        $updatedAt=date("Y/m/d H:i:s");
        $sql="UPDATE branch SET isDeleted=1, updatedAt='$updatedAt' WHERE id=".$id;
        if ($db->insert($sql))
        {

            $db->closeconn();
            return true;
        }
        return false;
    }

    public function getallbranches()
    {
        $db = new database();
        $branchesdataSql = "SELECT * FROM branch WHERE isDeleted=0 AND gymId=" . $this->id;
        $branchesdata = $db->selectArray($branchesdataSql);
        while ($row = mysqli_fetch_assoc($branchesdata)) {
            $branch = new branch();
            $branch->setId($row['id']);
            $branch->setCity($row['city']);
            $branch->setAddress($row['address']);
            $this->setBranchs($branch->getId(), $branch);
        }
        $db->closeconn();

    }



    public function addDepartment($department)
    {
        $db = new database();
        $department->setName($db->getMysqli()->real_escape_string($department->getName()));
        $createdAt=date("Y/m/d H:i:s");

        $sql = "INSERT INTO type(name,gymId,createdAt) VALUES('" . $department->getName() . "','" . $this->getId() . "','$createdAt');";
        $sql2 = "INSERT INTO privilege(typeId,pageId,hasAccess) VALUES";
        if ($db->insert($sql)) {
            if ($db->selectId($department, "type")) {
                foreach ($department->getPages() as $page) {
                    $page->set_name($db->getMysqli()->real_escape_string($page->get_name()));

                    $sql2 .= "(" . $department->getId() . "," . $page->get_id() . "," . $page->get_access() . "),";
                }
                $sql2 = trim($sql2, ",");
                $sql2 .= ";";
                if ($db->insert($sql2)) {
                    $this->setUserTypes($department->getId(), $department);
                    $_SESSION['Gym'] = serialize($this);
                    $db->closeconn();
                    return true;
                }
            }
        }
        $db->closeconn();
        return false;

    }

    public function editDepartment($depid)
    {
        $db = new database();
        $updatedate=date("Y/m/d H:i:s");

        $this->getUserTypes()[$depid]->setName($db->getMysqli()->real_escape_string($this->getUserTypes()[$depid]->getName()));
        $sql = "UPDATE type SET updatedAt='$updatedate', name='" . $this->getUserTypes()[$depid]->getName() . "' WHERE id=" . $this->getUserTypes()[$depid]->getId();
        if ($db->insert($sql)) {
            $sql2 = "";
            foreach ($this->getUserTypes()[$depid]->getPages() as $page) {
                $sql2 .= "UPDATE privilege SET hasAccess=" . $page->get_access() . " WHERE  typeId=" . $depid . " AND pageId=" . $page->get_id() . ";";
            }
            if ($db->multiinsert($sql2)) {
                $_SESSION['Gym'] = serialize($this);
                $db->closeconn();
                return true;
            }
        }

        return false;
    }

    public function deleteDepartment($typeid){
        $db = new database();
        $updatedate=date("Y/m/d H:i:s");

        $deletetype="UPDATE type set isDeleted=1 , updatedAt='$updatedate' where id='$typeid'";
        if ($db->insert($deletetype))
        {
                $db->closeconn();
                return true;



        }
        return false;
    }

    public function getalldepartments()
    {
        $db = new database();
        $departmentdataSql = "SELECT * FROM type WHERE isDeleted=0 AND gymId=" . $this->id ;

        $departmentdata = $db->selectArray($departmentdataSql);
        while ($row = mysqli_fetch_assoc($departmentdata)) {
            $department = new userType();
            $department->setName($row['name']);
            $department->setId($row['id']);
            $pagesql = "SELECT * FROM pages INNER JOIN privilege ON privilege.pageId=pages.id  WHERE  typeId=" . $row['id'];
            $pagedata = $db->selectArray($pagesql);
            while ($row2 = mysqli_fetch_assoc($pagedata)) {
                $page = new page();
                $page->set_id($row2['pageId']);
                $page->set_name($row2['pageName']);
                $page->set_access($row2['hasAccess']);
                $department->setPages($row2['pageId'], $page);
            }
            $this->setUserTypes($row['id'], $department);
        }
        $db->closeconn();

    }
    public function addPackage($package)
    {
        $db = new database();
        $newPackage=new package('array');
        $newPackage->setName($db->getMysqli()->real_escape_string($package->getName()));
        $newPackage->setPeriodType($package->getPeriodType());
        $createdAt=date("Y/m/d H:i:s");
        $sql = "INSERT INTO packagetype(name,type,gymId,createdAt) VALUES('" . $newPackage->getName() . "','".$newPackage->getPeriodType()."','" . $this->getId() . "','$createdAt');";
        if ($db->insert($sql)) {
            if ($db->selectId($package, "packagetype")) {
                $newPackage->setId($package->getId());

                foreach ($package->getPeriod() as $period) {
                    $period->setPeriod($db->getMysqli()->real_escape_string($period->getPeriod()));
                    $sql2 = "INSERT INTO packageperiod(packageTypeId,period) VALUES (" . $package->getId() . ",'" . $period->getPeriod() . "')";
                    $newperiod=new packagePeriod();
                    $newperiod->setPeriod($period->getPeriod());
                    if ($db->insert($sql2)&&$db->selectId($newperiod,'packageperiod')) {
                        $newPackage->setPeriodArray($newperiod->getId(),$newperiod);
                    }
                    else
                    {
                        $db->closeconn();
                        return false;
                    }
                }
                $this->setPackages($newPackage->getId(), $newPackage);
                $_SESSION['Gym'] = serialize($this);
                $db->closeconn();
                return true;
            }
        }
        $db->closeconn();
        return false;
    }
    public function editPackage($packageId)
    {
        $db = new database();
        $updatedate=date("Y/m/d H:i:s");

        $this->getPackages()[$packageId]->setName($db->getMysqli()->real_escape_string($this->getPackages()[$packageId]->getName()));
        $sql = "UPDATE packageType SET updatedAt='$updatedate', name='" . $this->getPackages()[$packageId]->getName() . "' WHERE id=" . $this->getPackages()[$packageId]->getId();
        if ($db->insert($sql)) {
                $_SESSION['Gym'] = serialize($this);
                $db->closeconn();
                return true;
        }

        return false;
    }
    public function deletePackage($packageId)
    {
        $db = new database();
        $updatedate=date("Y/m/d H:i:s");

        $deletePackage="UPDATE packagetype set isDeleted=1 , updatedAt='$updatedate' where id='$packageId'";
        if ($db->insert($deletePackage))
        {
            $db->closeconn();
            return true;



        }
        return false;
    }
    public function getallpackage()
    {
        $db = new database();
        $packagesql = "SELECT * FROM packagetype WHERE isDeleted=0 AND gymId=" . $this->id;
        $packagedata = $db->selectArray($packagesql);
        while ($row = mysqli_fetch_assoc($packagedata)) {
            $package = new package('array');
            $package->setId($row['id']);
            $package->setName($row['name']);
            $package->setPeriodType($row['type']);
            $periodsql="SELECT * FROM packageperiod WHERE packageTypeId=".$package->getId();
            $perioddata = $db->selectArray($periodsql);
            while ($row2 = mysqli_fetch_assoc($perioddata)) {
                $period=new packagePeriod();
                $period->setId($row2['id']);
                $period->setPeriod($row2['period']);
                $package->setPeriodArray($row2['id'],$period);
            }
            $this->setPackages($row['id'], $package);
        }

        $db->closeconn();

    }

    public function addpayment($payment)
    {
        $db = new database();
        $created=date("Y/m/d H:i:s");

        $payment->setName($db->getMysqli()->real_escape_string($payment->getName()));

        $sql = "INSERT INTO paymentmethod(name,gymId,createdAt) VALUES('" . $payment->getName() . "','" . $this->id . "','$created');";
        if ($db->insert($sql)) {
            if ($db->selectId($payment,'paymentmethod')) {
                $this->setPaymentMethods($payment->getId(), $payment);
                $_SESSION['Gym'] = serialize($this);
                $db->closeconn();
                return true;
            }
        }
        return false;

    }
    public function editPaymentMedthod($paymedId)
    {
        $db = new database();
        $updatedate=date("Y/m/d H:i:s");
        $this->getPaymentMethods()[$paymedId]->setName($db->getMysqli()->real_escape_string($this->getPaymentMethods()[$paymedId]->getName()));
        $sql = "UPDATE paymentmethod SET updatedAt='$updatedate', name='" . $this->getPaymentMethods()[$paymedId]->getName() . "' WHERE id=" . $this->getPaymentMethods()[$paymedId]->getId();
        if ($db->insert($sql)) {
            $_SESSION['Gym'] = serialize($this);
            $db->closeconn();
            return true;
        } else {
            $db->closeconn();
            return false;
        }

    }
    public function deletePaymentMethod($id)
    {
        $db = new database();
        $updatedAt=date("Y/m/d H:i:s");
        $sql="UPDATE paymentmethod SET isDeleted=1, updatedAt='$updatedAt' WHERE id=".$id;
        if ($db->insert($sql))
        {

            $db->closeconn();
            return true;
        }
        return false;
    }
    public function getallpaymentmethod()
    {
        $db = new database();
        $paymentdataSql = "SELECT * FROM paymentmethod WHERE isDeleted=0 AND gymId=" . $this->id;
        $paymentdata = $db->selectArray($paymentdataSql);
        while ($row = mysqli_fetch_assoc($paymentdata)) {
            $payment = new paymentmethod();
            $payment->setId($row['id']);
            $payment->setName($row['name']);
            $this->setPaymentMethods($payment->getId(), $payment);

        }
        $db->closeconn();

    }
}

