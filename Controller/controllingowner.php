<?php
include_once '../Model/employee.php';
include_once '../Model/gym.php';
if (isset($_GET['addowner'])) {
    $owner=new employee();
    $gym=new gym();
     $owner->setFirstName($_GET['fname']);
     $owner->setLastName($_GET['lname']);
     $owner->setMobilePhone($_GET['mobilephone']);
     $owner->setHomePhone($_GET['homephone']);
     $owner->setEmail($_GET['email']);
     $owner->setusername($_GET['username']);
     $owner->setpassword($_GET['password']);
     $owner->setBirthDay($_GET['birthday']);
     $owner->setdateadded($_GET['dateadded']);
     $owner->setGender($_GET['gender']);
     $gym->setname($_GET['gymname']);
    if ($owner->addowner()) {
        echo "added";
    }
    else
    {
        echo "<script> alert('Cannot add this Owner');</script>";
    }
    unset($owner);

}
