<?php
include_once 'branch.php';
include_once 'paymentmethod.php';
include_once 'usertype.php';
include_once 'page.php';
include_once 'featuretype.php';

class gym
{
    private $id;
    private $gymName;
    private $branches;
    private $userTypes;
    private $paymentMethods;
    private $packages;

    function __construct()
    {
        $this->branches = array();
        $this->userTypes = array();
        $this->packages = array();
        $this->paymentMethods = array();
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

    public function getUserTypes()
    {
        return $this->userTypes;
    }

    public function setUserTypes($uid,$userTypes)
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

    public function getPackages()
    {
        return $this->packages;
    }

    public function setPackages($packageid,$packages)
    {
        $this->packages[$packageid] = $packages;
    }

    public function addBranch($branch)
    {

        $db = new database();
        $branch->setCity($db->getMysqli()->real_escape_string($branch->getCity()));
        $branch->setAddress($db->getMysqli()->real_escape_string($branch->getAddress()));
        $sql = "INSERT INTO branch (city,address,gymId) VALUES ('" . $branch->getCity() . "','" . $branch->getAddress() . "','" . $this->id . "')";
        if ($db->insert($sql)) {


            if ($db->selectId($branch, "branch")) {


                $this->setBranchs(0,$branch);
                $db->closeconn();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getallbranches()
    {
        $db = new database();
        $branchesdataSql = "SELECT * FROM branch WHERE gymId=" . $this->id;
        $branchesdata = $db->selectArray($branchesdataSql);
        while ($row = mysqli_fetch_assoc($branchesdata)) {
            $branch = new branch();
            $branch->setId($row['id']);
            $branch->setCity($row['city']);
            $branch->setAddress($row['address']);
            $this->setBranchs($branch->getId(), $branch);
        }
    }

    public function getallpaymentmethod()
    {
        $db = new database();
        $paymentdataSql = "SELECT * FROM paymentmethod WHERE gymId=" . $this->id;
        $paymentdata = $db->selectArray($paymentdataSql);
        while ($row = mysqli_fetch_assoc($paymentdata)) {
            $payment = new paymentmethod();
            $payment->setId($row['id']);
            $payment->setName($row['name']);
            $this->setPaymentMethods($payment->getId(), $payment);
        }
    }

    public function getalldepartments()
    {
        $db = new database();
        $departmentdataSql = "SELECT * FROM type WHERE gymId=" . $this->id;

        $departmentdata = $db->selectArray($departmentdataSql);
        while ($row = mysqli_fetch_assoc($departmentdata)) {
            $department = new userType();
            $department->setName($row['name']);
            $department->setId($row['id']);
            $pagesql = "SELECT * FROM pages INNER JOIN privilege ON privilege.pageId=pages.id WHERE typeId=" . $row['id'];
            $pagedata = $db->selectArray($pagesql);
            while ($row2 = mysqli_fetch_assoc($pagedata)) {
                $page= new page();
                $page->set_id($row2['id']);
                $page->set_name($row2['name']);
                $page->set_access($row2['hasAccess']);
                $department->setPages($row2['id'],$page);

            }
            $this->setUserTypes($row['id'],$department);
        }
    }
    public function getallpackage(){
        $db = new database();
        $packagesql="SELECT * FROM featuretype WHERE gymId=" . $this->id;
        $packagedata=$db->selectArray($packagesql);
        while ($row = mysqli_fetch_assoc($packagedata)) {
            $package=new featuretype();
            $package->setId($row['id']);
            $package->setName($row['name']);
            $package->setPeriod($row['period']);
            $package->setPeriodType($row['type']);
            $this->setPackages($row['id'],$package);
        }



    }
}
