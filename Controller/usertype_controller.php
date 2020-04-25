<?php
include_once("../model/usertype.php");
include_once("../model/page.php");
include_once("../model/gym.php");
session_start();
$gym = unserialize($_SESSION['Gym']);

if (isset($_GET['depEditId']) && isset($_GET['addDepartment'])) {
    $gym->getUserTypes()[$_GET['depEditId']]->setName(htmlentities($_GET['depName']));
    if ($gym->getUserTypes()[$_GET['depEditId']]->checkifavailable($gym->getId()) == '1') {
        $_SESSION['messege'] = "This branch already exist";

     } else {
        $gym->getUserTypes()[$_GET['depEditId']]->getPages()[1]->set_access(isset($_GET['receptionCheck']) ? 1 : 0);
        $gym->getUserTypes()[$_GET['depEditId']]->getPages()[2]->set_access(isset($_GET['notificationCheck']) ? 1 : 0);
        $gym->getUserTypes()[$_GET['depEditId']]->getPages()[3]->set_access(isset($_GET['membersCheck']) ? 1 : 0);
        $gym->getUserTypes()[$_GET['depEditId']]->getPages()[4]->set_access(isset($_GET['employeesCheck']) ? 1 : 0);
        $gym->getUserTypes()[$_GET['depEditId']]->getPages()[5]->set_access(isset($_GET['contractsCheck']) ? 1 : 0);
        $gym->getUserTypes()[$_GET['depEditId']]->getPages()[6]->set_access(isset($_GET['adminCheck']) ? 1 : 0);
        $gym->getUserTypes()[$_GET['depEditId']]->getPages()[7]->set_access(isset($_GET['reportsCheck']) ? 1 : 0);
        if ($gym->editDepartment($_GET['depEditId'])) {
            $_SESSION['successMessege'] = "Edited Successfully";

            echo "<script> window.location.href='../views/departments.php';</script>";

        } else {
            $_SESSION['errormessege'] = "can't' Edit this department right now";

            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
} elseif (isset($_GET['depDeleteId'])) {

    if ($gym->deleteDepartment($_GET['depDeleteId']))
    {
        $departments=$gym->getUserTypes();
        unset($departments[$_GET['depDeleteId']]);
        $gym->setAlldepartments($departments);
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Deleted Successfully";
        echo "<script> window.location.href='../views/departments.php';</script>";
    }
    else
    {
        $_SESSION['errormessege'] = "can't' delete this department right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }

} elseif (isset($_GET['addDepartment']) && !isset($_GET['depEditId'])) {
    $department = new userType();
    $department->setName(htmlentities($_GET['depName']));
    if ($department->checkifavailable($gym->getId())=='1') {
        $_SESSION['messege'] = "This branch already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";


    } else {
        //reception
        $receptionPage = new page();
        $receptionPage->set_id(1);
        $receptionPage->set_name("Reciption");
        $receptionPage->set_access(isset($_GET['receptionCheck']) ? 1 : 0);
        $department->setPages($receptionPage->get_id(), $receptionPage);

        //notifications
        $notificationPage = new page();
        $notificationPage->set_id(2);
        $notificationPage->set_name("Notifications");
        $notificationPage->set_access(isset($_GET['notificationCheck']) ? 1 : 0);
        $department->setPages($notificationPage->get_id(), $notificationPage);

        //Members
        $memberPage = new page();
        $memberPage->set_id(3);
        $memberPage->set_name("Members");
        $memberPage->set_access(isset($_GET['membersCheck']) ? 1 : 0);
        $department->setPages($memberPage->get_id(), $memberPage);

        //Emlpoyees
        $EmlpoyeesPage = new page();
        $EmlpoyeesPage->set_id(4);
        $EmlpoyeesPage->set_name("Emlpoyees");
        $EmlpoyeesPage->set_access(isset($_GET['employeesCheck']) ? 1 : 0);
        $department->setPages($EmlpoyeesPage->get_id(), $EmlpoyeesPage);

        //Contracts
        $ContractsPage = new page();
        $ContractsPage->set_id(5);
        $ContractsPage->set_name("Contracts");
        $ContractsPage->set_access(isset($_GET['contractsCheck']) ? 1 : 0);
        $department->setPages($ContractsPage->get_id(), $ContractsPage);

        //Administration
        $AdministrationPage = new page();
        $AdministrationPage->set_id(6);
        $AdministrationPage->set_name("Administration");
        $AdministrationPage->set_access(isset($_GET['adminCheck']) ? 1 : 0);
        $department->setPages($AdministrationPage->get_id(), $AdministrationPage);

        //Reports
        $ReportsPage = new page();
        $ReportsPage->set_id(7);
        $ReportsPage->set_name("Reports");
        $ReportsPage->set_access(isset($_GET['reportsCheck']) ? 1 : 0);
        $department->setPages($ReportsPage->get_id(), $ReportsPage);
        if ($gym->addDepartment($department)) {
            $_SESSION['successMessege'] = "Added successfully";

            echo "<script> window.location.href='../views/departments.php';</script>";

        } else {
            $_SESSION['errormessege'] = "can't' add this department right now";

            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}