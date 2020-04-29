<?php
include_once "../model/member.php";
include_once('../model/gym.php');

session_start();
$gym = unserialize($_SESSION['Gym']);
if (isset($_POST['memberEditId']) && isset($_POST['editMember']) && isset($_POST['branchId'])) {
    if (file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])) {
        $img = $_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"], "../public/img/" . $img);
    } elseif ($gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->getImage() == "DefaultPersonimage.png") {
        $img = "DefaultPersonimage.png";
    } else {
        $img = $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->getImage();
    }
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setFirstName(htmlentities($_POST['firstName']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setLastName(htmlentities($_POST['lname']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setEmail(htmlentities($_POST['email']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setGender(htmlentities($_POST['gender']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setMobilePhone(htmlentities($_POST['mobilePhone']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setHomePhone(htmlentities($_POST['homePhone']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setBirthday(htmlentities($_POST['birthday']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setImage($img);
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setWorkPhone(htmlentities($_POST['workPhone']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setEmergencyNumber(htmlentities($_POST['emergency']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setMarriedStatus($_POST['marriedStatus']);
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setCompanyName(htmlentities($_POST['companyName']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setAddress(htmlentities($_POST['personalAddress']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setCompanyAddress(htmlentities($_POST['companyAddress']));
    $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']]->setFaxNumber(htmlentities($_POST['faxNumber']));
    if (isset($_POST['branch'])) {
        $branchId = $_POST['branch'];
    } else {
        $branchId = $_POST['branchId'];
    }
    if ($gym->getBranchs()[$_POST['branchId']]->editMember($_POST['memberEditId'], $branchId)) {
        if (isset($_POST['branch'])) {
            $branchId = $_POST['branch'];
            $member = $gym->getBranchs()[$_POST['branchId']]->getMembers()[$_POST['memberEditId']];
            $allmembers = $gym->getBranchs()[$_POST['branchId']]->getMembers();
            unset($allmembers[$_POST['memberEditId']]);
            $gym->getBranchs()[$_POST['branchId']]->setAllMembers($allmembers);
            $gym->getBranchs()[$branchId]->setMembers($member->getId(), $member);
        }
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Edited Successfully";
       echo "<script> window.location.href='../views/members.php';</script>";
    } else {
        $_SESSION['errormessege'] = "can't' Edit this member right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }
}

elseif (isset($_GET['memberBranchId']) && isset($_GET['memberDeleteId'])) {
    if ($gym->getBranchs()[$_GET['memberBranchId']]->deleteMember($_GET['memberDeleteId'])) {
        $Members = $gym->getBranchs()[$_GET['memberBranchId']]->getMembers();
        unset($Members[$_GET['memberDeleteId']]);
        $gym->getBranchs()[$_GET['memberBranchId']]->setAllMembers($Members);
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Deleted Successfully";
        echo "<script> window.location.href='../views/members.php';</script>";
    } else {
        $_SESSION['errormessege'] = "can't' delete this Member right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }

}
elseif (isset($_POST['addmember']) && !isset($_POST['memberEditId'])) {
    $member= new member();
    $member->setEmail(htmlentities($_POST['email']));
    $member->setFirstName(htmlentities($_POST['fname']));
    $member->setLastName(htmlentities($_POST['lname']));
    $member->setWorkPhone(htmlentities(isset($_POST['WorkPhone']) ? $_POST['WorkPhone'] : ''));
    $member->setFaxNumber(htmlentities(isset($_POST['faxnumber']) ? $_POST['faxnumber'] : ''));
    $member->setGender(htmlentities($_POST['gender']));
    $member->setMobilePhone(htmlentities($_POST['phonenumber']));
    $member->setHomePhone(htmlentities(isset($_POST['homephone']) ? $_POST['homephone'] : ''));
    $member->setBirthday(htmlentities($_POST['birthday']));
    $member->setMarriedStatus(htmlentities($_POST['marriedStatus']));
    $member->setCompanyName(htmlentities(isset($_POST['CompanyName']) ? $_POST['CompanyName'] : ''));
    $member->setAddress(htmlentities($_POST['personaddress']));
    $member->setCompanyAddress(htmlentities(isset($_POST['companyaddress']) ? $_POST['companyaddress'] : ''));
    $member->setEmergencyNumber(htmlentities(isset($_POST['emergency']) ? $_POST['emergency'] : ''));
    if (file_exists($_FILES['Pimage']['tmp_name']) || is_uploaded_file($_FILES['Pimage']['tmp_name'])) {
        $img = $_FILES["Pimage"]["name"];
        move_uploaded_file($_FILES["Pimage"]["tmp_name"], "../public/img/" . $img);
    } else {
        $img = "DefaultPersonImage.png";
    }
    $member->setImage($img);
    if ($_SESSION['branch']==NULL)
    {
        $addedByEmp = $gym->getOwner();
    }
    else
    {
       $addedByEmp= $gym->getBranchs()[$_SESSION['branch']]->getEmployees()[$_SESSION['id']];
    }
    $member->setAddedBy($addedByEmp->getFirstName()." ".$addedByEmp->getLastName());
    if (isset($_GET['branch'])) {
        $branch = $_GET['branch'];
    } else {
        $branch = $_SESSION['branch'];
    }
    if ($gym->getBranchs()[$branch]->addMember($member)) {
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Added Successfully";

        echo "<script> window.location.href='../views/members.php';</script>";

    } else {
        $_SESSION['errormessege'] = "There was a problem while Adding Member";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
}