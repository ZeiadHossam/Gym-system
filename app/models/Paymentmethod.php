<?php
include_once 'ICheckAvailability.php';


class Paymentmethod implements ICheckAvailability
{
 private $id;
 private $name;


    public function getId()
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
    public function checkifavailable($gymId)
    {
        $db = new Database();
        $this->setName($db->getMysqli()->real_escape_string($this->getName()));
        if ($this->getId()!=NULL) {

            $branchsql = "select id  from paymentmethod where isDeleted=0  AND gymId=$gymId AND NOT id=" . $this->getId() . " AND name='".$this->getName()."';";
        }
        else
        {
            $branchsql = "select id  from paymentmethod where isDeleted=0  AND gymId=$gymId AND name='".$this->getName()."';";

        }
        $branches=$db->select($branchsql);
        if($branches!=NULL)
        {
            $db->closeconn();
            return '1';
        }
        $db->closeconn();
        return '0';
    }


}