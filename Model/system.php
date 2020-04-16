<?php
include_once 'gym.php';


class system
{
    public function addowner()
    {

        $db = new database();
        $gym=new gym();
        $sql = "INSERT INTO person (firstName,lastName,birthDay,mobilePhone,homePhone,gender,email)
		VALUES ('".$this->getFirstName()."','".$this->getLastName()."','".$this->getBirthDay()."','".$this->getMobilePhone()."','".$this->getHomePhone()."','".$this->getGender()."','".$this->getEmail()."');";
        $ownerID = "SELECT id FROM person WHERE firstName='".$this->getFirstName()."' AND lastName='".$this->getLastName()."' AND mobilePhone='".$this->getMobilePhone()."'";
//       $sql .= "INSERT INTO employee(personId,userName,password,dateAdded)VALUES (($ownerID),'".$this->getusername()."','".$this->getpassword()."','".$this->getdateadded()."');";
        //    $sql .= "INSERT INTO gym (ownerId,name)VALUES (($ownerID ) ,'".$gym->getname()."') ;";

        if ($db->multiinsert($sql)) {

            return true;
        } else {

            return false;
        }
    }

}