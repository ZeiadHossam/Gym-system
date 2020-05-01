<?php
include_once ("ICheckAvailability.php");
include_once ("PackagePeriod.php");


class Package implements ICheckAvailability
{
    private $id;
    private $name;
    private $periodType;
    private $period;

    function __construct($periodDataType) {
        if($periodDataType=='array')
        {$this->period = array();}
        if($periodDataType=='period')
        {$this->period = new PackagePeriod();}


    }

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
    public function setPeriodArray($periodid,$period)
    {
        $this->period[$periodid]=$period;
    }

    public function setPeriod($period)
    {
        $this->period = $period;
    }

    public function checkifavailable($gymId)
    {
        $db = new Database();
        $this->setName($db->getMysqli()->real_escape_string($this->getName()));
        $this->setPeriodType($db->getMysqli()->real_escape_string($this->getPeriodType()));
        if ($this->getId() != NULL) {
            $packagesql = "select id  from packagetype where id <> " . $this->getId() . " AND isDeleted=0 AND gymId=$gymId AND name='" . $this->getName() . "' AND type='" . $this->getPeriodType() . "' ;";
        } else {
            $packagesql = "select id  from packagetype where  isDeleted=0 AND gymId=$gymId AND name='". $this->getName() ."' AND type='". $this->getPeriodType() ."' ;";

        }
        $packages = $db->select($packagesql);
        if ($packages != NULL) {
            $db->closeconn();
            return '1';
        }
        $db->closeconn();
        return '0';
    }
    public function deleteAllPeriods()
    {
        $db = new Database();
        $sql="DELETE FROM  packageperiod WHERE packageTypeId=".$this->getId();
        if ($db->insert($sql))
        {
            unset($this->period);
            $this->period=array();
            $db->closeconn();
            return true;
        }
        return false;
    }
    public function addPeriods()
    {
        $db = new Database();
        foreach ($this->getPeriod() as $period) {
            $period->setPeriod($db->getMysqli()->real_escape_string($period->getPeriod()));
            $sql2 = "INSERT INTO packageperiod(packageTypeId,period) VALUES (" . $this->getId() . ",'" . $period->getPeriod() . "')";
            if ($db->insert($sql2)) {
                $db->selectId($period,'packageperiod');
            }
            else
            {
                $db->closeconn();
                return false;
            }
        }
        $db->closeconn();
        return true;
    }
}