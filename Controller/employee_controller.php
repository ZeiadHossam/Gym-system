<?php
include_once('../model/branch.php');
include_once('../model/page.php');
include_once('../model/gym.php');
include_once('../model/employee.php');
include_once('../model/usertype.php');
session_start();
$gym = unserialize($_SESSION['Gym']);
if (isset($_GET['employeeEditId']) && isset($_GET['addemployee'])) {

}
elseif (isset($_GET['employeeDeleteId'])) {


}
elseif (isset($_GET['addemployee']) && !isset($_GET['employeeEditId'])) {
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
            $img = "DefaultPersonimage.png";
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

            echo "<script> window.location.href='../views/employee.php';</script>";

        } else {
            $_SESSION['errormessege']="There was a problem while Adding Employee";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}