<?php
include 'employee.php';
if (isset($_GET['addemployee'])) {
    $employee=new employee();
    $employee->setFirstName($_GET['fname']);
    $employee->setLastName($_GET['lname']);
    $employee->setEmail($_GET['email']);
    $employee->setusername($_GET['username']);
    $employee->setpassword($_GET['password']);
    $employee->setdateadded($_GET['dateadded']);
    $employee->setImage($_GET['img']);
    $employee->setusertype($_GET['usertype']);
    $employee->setGender($_GET['gender']);
    $employee->setHomePhone($_GET['homephone']);
    $employee->setMobilePhone($_GET['phonenumber']);
    $employee->setBirthDay($_GET['birthday']);

    if ($employee->addemployee()) {
        echo "added";
    }
    else
    {
        echo "<script> alert('Cannot add this employee');</script>";
    }

    unset($employee);
}

