<?php
include_once "../model/member.php";
include_once('../model/gym.php');

session_start();
$gym = unserialize($_SESSION['Gym']);
if (isset($_POST['employeeEditId']) && isset($_POST['editEmployee']) && isset($_POST['branchId'])) {

}
elseif (isset($_POST['personDeleteId']) && isset($_POST['empBranchId']) && isset($_POST['empDeleteId'])) {


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
    $member->setAddedBy($addedByEmp->getId()."-".$addedByEmp->getFirstName()." ".$addedByEmp->getLastName());
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