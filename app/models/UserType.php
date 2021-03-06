<?php
include_once ("ICheckAvailability.php");

class UserType implements ICheckAvailability
{
    private $id;
    private $name;
    private $pages;

    function __construct() {
        $this->pages = array();
    }

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

    public function getPages()
    {
        return $this->pages;
    }

    public function setPages($Pid,$pages)
    {
        $this->pages[$Pid] = $pages;
    }
    public function setAllpages($pages)
    {
        $this->pages = $pages;
    }
    public function checkifavailable($gymId)
    {
        $db = new Database();
        $this->setName($db->getMysqli()->real_escape_string($this->getName()));
        if ($this->getId()!=NULL) {
            $depSql = "select id  from type where not id='".$this->getId()."' AND gymId='$gymId' AND name='" . $this->getName() . "' AND isDeleted=0;";
        }
        else{
            $depSql = "select id  from type where  gymId='$gymId' AND name='" . $this->getName() . "' AND isDeleted=0;";

        }

            $departments = $db->select($depSql);
            if ($departments != NULL) {
                $db->closeconn();
                return '1';
            }

        $db->closeconn();
        return '0';

    }
}