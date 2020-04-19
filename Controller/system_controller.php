<?php
include_once '../Model/system.php';
include_once '../Model/employee.php';

if (isset($_GET['addowner'])) {
    $system = new system();
    $gymName = $_GET['gymname'];
    $branchCity = $_GET['branchcity'];
    $branchAddress = $_GET['branchaddress'];
    $employee = new employee();
    $employee->setFirstName($_GET['fname']);
    $employee->setLastName($_GET['lname']);
    $employee->setMobilePhone($_GET['mobilephone']);
    $employee->setHomePhone($_GET['homephone']);
    $employee->setEmail($_GET['email']);
    $employee->setusername($_GET['username']);
    $employee->setpassword($_GET['password']);
    $employee->setBirthDay($_GET['birthday']);
    $employee->setdateadded($_GET['dateadded']);
    $employee->setGender($_GET['gender']);
    $employee->getusertype()->setId(0);
    if ($system->addgym($employee,$gymName,$branchCity,$branchAddress)) {
        echo "<script> window.location.href='../views/login.php';</script>";
    }
    else
    {
        echo "<script> alert('Cannot add member');</script>";
    }

}