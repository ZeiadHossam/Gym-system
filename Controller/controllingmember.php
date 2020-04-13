<?php
include 'member.php';

if (isset($_GET['addmember'])) {
    $member = new member();
    $member->setFirstName($_GET['fname']);
    $member->setLastName($_GET['lname']);
    $member->setBirthDay($_GET['birthday']);
	$member->setEmail(isset($_GET['email']) ? $_GET['email'] : '');
    $member->setMobilePhone($_GET['phonenumbers']);
	$member->setWorkPhone(isset($_GET['workphone']) ? $_GET['workphone'] : '');
	$member->setFaxNumber(isset($_GET['faxnumber']) ? $_GET['faxnumber'] : '');
    $member->setAddress($_GET['personaddress']);
	$member->setCompanyAddress(isset($_GET['companyaddress']) ? $_GET['companyaddress'] : '');
	$member->setCompany(isset($_GET['companyname']) ? $_GET['companyname'] : '');
    $member->setGender($_GET['gender']);
	$member->setMarriedStatus(isset($_GET['marriedstaus']) ? $_GET['marriedstaus'] : '');
	$member->setHomePhone(isset($_GET['homephone']) ? $_GET['homephone'] : '');
    $member->setEmergencyNumber(isset($_GET['emergency']) ? $_GET['emergency'] : '');
	$member->setImage(isset($_GET['img']) ? $_GET['img'] : '');
    $member->setAddedBy($_GET['addedby']);
	if ($member->addmember()) {
		echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else
    {
        echo "<script> alert('Cannot add member');</script>";
    }

	unset($member);
}