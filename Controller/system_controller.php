<?php
include_once '../Model/system.php';
include_once '../Model/employee.php';
if (isset($_POST['addowner'])) {
    session_start();
    $system = new system();
    $gymName = htmlentities($_POST['gymname']);
    $gymimg = $_FILES["gymimage"]["name"];
    move_uploaded_file($_FILES["gymimage"]["tmp_name"], "../public/img/" . $gymimg);
    $branch = new branch();
    $branch->setCity(htmlentities($_POST['branchcity']));
    $branch->setAddress(htmlentities($_POST['branchaddress']));
    $employee = new employee();
    $employee->setEmail(htmlentities($_POST['email']));
    $employee->setusername(htmlentities($_POST['username']));
    $employee->setMobilePhone(htmlentities($_POST['mobilephone']));
    if (!$system->checkGymAvailability($gymName)) {
        $_SESSION['messege'] = "Gym name already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } elseif ($employee->checkifavailable() == '1') {
        $_SESSION['messege'] = "Username already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } elseif ($employee->checkifavailable() == '2') {
        $_SESSION['messege'] = "Email already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } elseif ($employee->checkifavailable() == '3') {
        $_SESSION['messege'] = "Mobile Phone already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } elseif ($branch->checkifavailable() == '1') {
        $_SESSION['messege'] = "This branch already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } else {
        $employee->setFirstName(htmlentities($_POST['fname']));
        $employee->setLastName(htmlentities($_POST['lname']));
        $employee->setHomePhone(htmlentities($_POST['homephone']));

        $employee->setpassword(htmlentities($_POST['password']));
        $employee->setBirthDay($_POST['birthday']);
        $employee->setdateadded(date("Y-m-d"));
        $employee->setGender($_POST['gender']);
        $img = $_FILES["image"]["name"];
        $employee->setImage($img);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../public/img/" . $img);

        $employee->getusertype()->setId(0);
        if ($system->addgym($employee, $gymName, $branch, $gymimg)) {
          session_destroy();
           echo "<script> window.location.href='../views/login.php';</script>";
        } else {
            $_SESSION['errormessege'] = "There was a problem while Adding your system";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}