<?php
include_once 'ICheckAvailability.php';


class paymentmethod implements ICheckAvailability
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
        $db = new database();
        $this->setName($db->getMysqli()->real_escape_string($this->getName()));
        $branchsql="select id  from paymentmethod where isDeleted=0  AND gymId=$gymId AND id='".$this->getId()."';";
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