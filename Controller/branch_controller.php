<?php
include_once('../model/branch.php');
include_once('../model/gym.php');
session_start();
if (isset($_GET['branchEditId']) && isset($_GET['addbranch'])) {
    $gym = unserialize($_SESSION['Gym']);
    $gym->getBranchs()[$_GET['branchEditId']]->setCity(htmlentities($_GET['branchCity']));
    $gym->getBranchs()[$_GET['branchEditId']]->setAddress(htmlentities($_GET['branchAddress']));
    if ($gym->getBranchs()[$_GET['branchEditId']]->checkifavailable($gym->getId()) == '1') {
        $_SESSION['messege'] = "This branch already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } else {
        if ($gym->editBranch($_GET['branchEditId'])) {
            $_SESSION['successMessege'] = "Edited Successfully";

            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        } else {
             $_SESSION['errormessege']="There was a problem while Editing branch";
         echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
} elseif (isset($_GET['branchDeleteId'])) {
    $gym = unserialize($_SESSION['Gym']);
    if ($gym->deleteBranch($_GET['branchDeleteId']))
    {
        $branches=$gym->getBranchs();
        unset($branches[$_GET['branchDeleteId']]);
        $gym->setAllBranchs($branches);
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Deleted Successfully";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else
    {
        $_SESSION['errormessege'] = "can't' delete this branch right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }
} elseif (isset($_GET['addbranch']) && !isset($_GET['branchEditId'])) {
    $branch = new branch();
    $branch->setCity(htmlentities($_GET['branchCity']));
    $branch->setAddress(htmlentities($_GET['branchAddress']));
    $gym = unserialize($_SESSION['Gym']);
    if ($branch->checkifavailable($gym->getId()) == '1') {
        $_SESSION['messege'] = "This branch already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } else {
        if ($gym->addBranch($branch)) {
            $_SESSION['successMessege'] = "Added Successfully";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
          } else {
            $_SESSION['errormessege']="There was a problem while Adding  branch";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}