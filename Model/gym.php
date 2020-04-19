<?php
include_once 'branch.php';

class gym
{
    private $id;
    private $gymName;
    private $branches;
    private $userTypes;
    private $paymentMethods;
    private $packages;

    function __construct() {
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

    public function setBranchs($BID,$branchs)
    {
        $this->branches[$BID] = $branchs;
    }

    public function getUserTypes()
    {
        return $this->userTypes;
    }

    public function setUserTypes($userTypes)
    {
        $this->userTypes[] = $userTypes;
    }

    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    public function setPaymentMethods($paymentMethods)
    {
        $this->paymentMethods[] = $paymentMethods;
    }

    public function getPackages()
    {
        return $this->packages;
    }

    public function setPackages($packages)
    {
        $this->packages[] = $packages;
    }

    public function addBranch($branch)
    {

        $db = new database();
        $branch->setCity($db->getMysqli()->real_escape_string($branch->getCity()));
        $branch->setAddress($db->getMysqli()->real_escape_string($branch->getAddress()));
        $sql="INSERT INTO branch (city,address,gymId) VALUES ('".$branch->getCity()."','".$branch->getAddress()."','".$this->id."')";
        if($db->insert($sql)) {


            if($db->selectId($branch,"branch"))
            {


                $this->setBranchs($branch);
                $db->closeconn();
                return true;
            }
            else
            {
                return false;
            }
        }
        else {
            return false;
        }
    }
    public function getallbranches()
    {
        $db = new database();
        $branchesdataSql = "SELECT * FROM branch WHERE gymId=".$this->id;
        $branchesdata=$db->selectArray($branchesdataSql);
        while($row = mysqli_fetch_assoc($branchesdata))
        {
            $branch=new branch();
            $branch->setId($row['id']);
            $branch->setCity($row['city']);
            $branch->setAddress($row['address']);
            $this->setBranchs($branch->getId(),$branch);
        }
    }

}