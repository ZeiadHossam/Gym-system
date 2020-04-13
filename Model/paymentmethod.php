<?php
include_once 'database.php';


class paymentmethod
{
    private $id;
    private $name;



    public function getid()
    {
        return $this->id;
    }


    public function getname()
    {
        return $this->name;
    }


    public function setname($name)
    {
        $this->name = $name;
    }

    public function addpaymentmethod()
    {
        $db = new database();
        $sql = "INSERT INTO paymentmethod(name) VALUES('".$this->getname()."');";

        if ($db->insert($sql)) {
            return true;
        } else {

            return false;
        }
    }

}