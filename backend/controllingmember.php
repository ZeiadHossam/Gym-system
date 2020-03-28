<?php
include 'member.php';
include 'employee.php';

if (isset($_GET['addmember'])) {
    $member = new member();

    $member->firstName =$_GET['fname'];
    $member->lastName = $_GET['lname'];
    $member->birthDay = $_GET['birthday'];
    $member->email = isset($_GET['email']) ? $_GET['email'] : '';
    $member->mobilePhone = $_GET['phonenumbers'];
    $member->workPhone = isset($_GET['workphone']) ? $_GET['workphone'] : '';
    $member->faxNumber = isset($_GET['faxnumber']) ? $_GET['faxnumber'] : '';
    $member->address = $_GET['personaddress'];
    $member->companyAddress = isset($_GET['companyaddress']) ? $_GET['companyaddress'] : '';
    $member->company = isset($_GET['companyname']) ? $_GET['companyname'] : '';
    $member->gender = $_GET['gender'];
    $member->marriedStatus = isset($_GET['marriedstaus']) ? $_GET['marriedstaus'] : '';
    $member->homePhone = isset($_GET['homephone']) ? $_GET['homephone'] : '';
    $member->emergencyNumber = isset($_GET['emergency']) ? $_GET['emergency'] : '';
    $member->image = isset($_GET['img']) ? $_GET['img'] : '';
    $member->addedBy = $_GET['addedby'] ? $_GET['addedby'] : '';

    if (employee::addmember($member)) {
         echo "<script> alert('tarok');</script>";
    }
    else
    {
        echo "<script> alert('k');</script>";
    }

    //  echo "<script> window.location.href='../index.php';</script>";

}