<?php
include_once ("ICheckAvailability.php");


class Package implements ICheckAvailability
{
    private $id;
    private $name;
    private $periodType;
    private $period;


    public function getId ()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getPeriodType()
    {
        return $this->periodType;
    }


    public function setPeriodType($periodType)
    {
        $this->periodType = $periodType;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function setPeriod($period)
    {
        $this->period = $period;
    }

    public function checkifavailable($gymId)
    {
        $db = new database();
        $this->setName($db->getMysqli()->real_escape_string($this->getName()));
        $this->setPeriod($db->getMysqli()->real_escape_string($this->getPeriod()));
        $this->setPeriodType($db->getMysqli()->real_escape_string($this->getPeriodType()));
        if ($this->getId() != NULL) {
            $packagesql = "select id  from featuretype where NOT id=" . $this->getId() . " AND isDeleted=0 AND gymId=$gymId AND name='" . $this->getName() . "' AND type='" . $this->getPeriodType() . "' AND period='".$this->getPeriod()."';";
        } else {
            $packagesql = "select id  from branch where  isDeleted=0 AND gymId=$gymId AND name='". $this->getName() ."' AND type='". $this->getPeriodType() ."' AND period='".$this->getPeriod()."';";

        }
        $packages = $db->select($packagesql);
        if ($packages != NULL) {
            $db->closeconn();
            return '1';
        }
        $db->closeconn();
        return '0';
    }
}