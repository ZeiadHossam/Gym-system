<?php


class userType
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

}