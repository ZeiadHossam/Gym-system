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

    public function setBranchs($branchs)
    {
        $this->branches[] = $branchs;
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
        $sql="INSERT INTO branch (city,address,gymId) VALUES ('".$branch->getCity()."','".$branch->getAddress()."','".$this->id."')";
        if($db->insert($sql)) {


            if($branch->getIdFromDB())
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

}