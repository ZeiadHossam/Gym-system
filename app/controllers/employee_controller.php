<?php
include_once('../model/branch.php');
include_once('../model/page.php');
include_once('../model/gym.php');
include_once('../model/employee.php');
include_once('../model/usertype.php');
session_start();
$gym = unserialize($_SESSION['Gym']);
if (isset($_POST['employeeEditId']) && isset($_POST['editEmployee']) && isset($_POST['branchId'])) {

    if (file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])) {
        $img = $_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"], "../public/img/" . $img);
    } elseif ($gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getImage() == "DefaultPersonimage.png") {
        $img = "DefaultPersonimage.png";
    } else {
        $img = $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getImage();
    }
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setFirstName(htmlentities($_POST['firstName']));
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setLastName(htmlentities($_POST['lname']));
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setEmail(htmlentities($_POST['email']));
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setGender(htmlentities($_POST['gender']));
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setMobilePhone(htmlentities($_POST['mobilePhone']));
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setHomePhone(htmlentities($_POST['homePhone']));
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setBirthday(htmlentities($_POST['birthday']));
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setImage($img);
    $userTypeId=$_POST['usertype'];
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getUsertype()->setId($_POST['usertype']);
    $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getUsertype()->setName($gym->getUserTypes()[$userTypeId]->getName());
    for($i=1;$i<8;$i++)
    {
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getUsertype()->getPages()[$i]->set_access($gym->getUserTypes()[$userTypeId]->getPages()[$i]->get_access());
    }
    if (isset($_POST['branch'])) {
        $branchId = $_POST['branch'];
    }
    else
    {
        $branchId = $_POST['branchId'];
    }
    if ($gym->getBranchs()[$_POST['branchId']]->editEmployee($_POST['employeeEditId'],$branchId)) {
        if (isset($_POST['branch']))
        {
            $branchId=$_POST['branch'];
            $employee=$gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']];
            $allEmployees=$gym->getBranchs()[$_POST['branchId']]->getEmployees();
            unset($allEmployees[$_POST['employeeEditId']]);
            $gym->getBranchs()[$_POST['branchId']]->setAllEmployees($allEmployees);
            $gym->getBranchs()[$branchId]->setEmployees($employee->getId(),$employee);
        }
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Edited Successfully";
        echo "<script> window.location.href='../views/employees.php';</script>";
    } else {
        $_SESSION['errormessege'] = "can't' Edit this Employee right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }
} elseif (isset($_GET['personDeleteId']) && isset($_GET['empBranchId']) && isset($_GET['empDeleteId'])) {
    if ($gym->getBranchs()[$_GET['empBranchId']]->deleteEmployee($_GET['personDeleteId'])) {
        $Employees = $gym->getBranchs()[$_GET['empBranchId']]->getEmployees();
        unset($Employees[$_GET['empDeleteId']]);
        $gym->getBranchs()[$_GET['empBranchId']]->setAllEmployees($Employees);
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Deleted Successfully";
        echo "<script> window.location.href='../views/employees.php';</script>";
    } else {
        $_SESSION['errormessege'] = "can't' delete this Employee right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }

} elseif (isset($_GET['addemployee']) && !isset($_GET['employeeEditId'])) {
    $employee = new employee();
    $employee->setUserName(htmlentities($_GET['username']));
    if (!$employee->checkusernameifavailable()) {
        $_SESSION['messege'] = "Username already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } else {

        $employee->setFirstName(htmlentities($_GET['fname']));
        $employee->setLastName(htmlentities($_GET['lname']));
        $employee->setEmail(htmlentities($_GET['email']));
        $employee->setGender(htmlentities($_GET['gender']));
        $employee->setMobilePhone(htmlentities($_GET['phonenumber']));
        $employee->setHomePhone(htmlentities($_GET['homephone']));
        $employee->setPassword(htmlentities($_GET['password']));
        $employee->setBirthday(htmlentities($_GET['birthday']));
        if (isset($_FILES['Pimage'])) {
            $img = $_FILES["Pimage"]["name"];
            move_uploaded_file($_FILES["Pimage"]["tmp_name"], "../public/img/" . $img);
        } else {
            $img = "DefaultPersonImage.png";
        }
        $employee->setImage($img);
        $employee->getUsertype()->setId(htmlentities($_GET['usertype']));
        $employee->getUsertype()->setName($gym->getUserTypes()[$_GET['usertype']]->getName());
        foreach ($gym->getUserTypes()[$_GET['usertype']]->getPages() as $page) {
            $newpage = new page();
            $newpage->set_id($page->get_id());
            $newpage->set_name($page->get_name());
            $newpage->set_access($page->get_access());
            $employee->getUsertype()->setPages($newpage->get_id(), $newpage);
        }
        if (isset($_GET['branch'])) {
            $branch = $_GET['branch'];
        } else {
            $branch = $_SESSION['branch'];
        }
        if ($gym->getBranchs()[$branch]->addemployee($employee, $branch)) {
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Added Successfully";

            echo "<script> window.location.href='../views/employees.php';</script>";

        } else {
            $_SESSION['errormessege'] = "There was a problem while Adding Employee";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}