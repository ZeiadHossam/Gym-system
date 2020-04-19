<?php
include_once '../Model/system.php';
include_once '../Model/employee.php';
if (isset($_POST['addowner'])) {

    $system = new system();
    $gymName = $_POST['gymname'];
    $branchCity = $_POST['branchcity'];
    $branchAddress = $_POST['branchaddress'];
    $employee = new employee();
    $employee->setFirstName($_POST['fname']);
    $employee->setLastName($_POST['lname']);
    $employee->setMobilePhone($_POST['mobilephone']);
    $employee->setHomePhone($_POST['homephone']);
    $employee->setEmail($_POST['email']);
    $employee->setusername($_POST['username']);
    $employee->setpassword($_POST['password']);
    $employee->setBirthDay($_POST['birthday']);
    $employee->setdateadded(date("Y-m-d"));
    $employee->setGender($_POST['gender']);
    $img = $_FILES["image"]["name"];
    $employee->setImage($img);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../public/img/" . $img);

    $employee->getusertype()->setId(0);
    if ($system->addgym($employee, $gymName, $branchCity, $branchAddress)) {
        echo "<script> window.location.href='../views/login.php';</script>";
    } else {
        echo "<script> alert('Cannot add member');</script>";
    }
}