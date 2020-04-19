<?php
include_once '../Model/system.php';
include_once '../Model/employee.php';
if (isset($_POST['addowner'])) {

    $system = new system();
    $gymName = $_POST['gymname'];
    $branch = new branch();
    $branch->setCity($_POST['branchcity']);
    $branch->setAddress($_POST['branchaddress']);
    $employee = new employee();
    $employee->setEmail($_POST['email']);
    $employee->setusername($_POST['username']);
    $employee->setMobilePhone($_POST['mobilephone']);
    if (!$system->checkGymAvailability($gymName)) {
        echo "<script> alert('Gym name already exist');</script>";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } elseif ($branch->checkEmpDataAvailability($employee) == '1') {
        echo "<script> alert('Username already exist');</script>";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }elseif ($branch->checkEmpDataAvailability($employee) == '2') {
        echo "<script> alert('Email already exist');</script>";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }elseif ($branch->checkEmpDataAvailability($employee) == '3') {
        echo "<script> alert('Mobile Phone already exist');</script>";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } else {
        $employee->setFirstName($_POST['fname']);
        $employee->setLastName($_POST['lname']);

        $employee->setHomePhone($_POST['homephone']);

        $employee->setpassword($_POST['password']);
        $employee->setBirthDay($_POST['birthday']);
        $employee->setdateadded(date("Y-m-d"));
        $employee->setGender($_POST['gender']);
        $img = $_FILES["image"]["name"];
        $employee->setImage($img);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../public/img/" . $img);

        $employee->getusertype()->setId(0);
        if ($system->addgym($employee, $gymName, $branch)) {
            echo "<script> window.location.href='../views/login.php';</script>";
        } else {
            echo "<script> alert('Cannot add member');</script>";
        }
    }
}