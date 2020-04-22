<?php
include_once('../model/branch.php');
include_once('../model/gym.php');
session_start();
if (isset($_GET['branchEditId']) && isset($_GET['addbranch'])) {
    $gym = unserialize($_SESSION['Gym']);
    $gym->getBranchs()[$_GET['branchEditId']]->setCity(htmlentities($_GET['branchCity']));
    $gym->getBranchs()[$_GET['branchEditId']]->setAddress(htmlentities($_GET['branchAddress']));
    if ($gym->getBranchs()[$_GET['branchEditId']]->checkifavailable() == '1') {
        $_SESSION['messege'] = "This branch already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } else {
        if ($gym->editBranch($_GET['branchEditId'])) {
            echo "<script> window.location.href='../views/branch.php';</script>";
        } else {
             $_SESSION['errormessege']="There was a problem while Adding your system";
        }   echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
} elseif (isset($_GET['branchDeleteId'])) {
    //delete
    echo "<script> window.location.href='javascript:history.go(-1)';</script>";
} elseif (isset($_GET['addbranch']) && !isset($_GET['branchEditId'])) {
    $branch = new branch();
    $branch->setCity(htmlentities($_GET['branchCity']));
    $branch->setAddress(htmlentities($_GET['branchAddress']));
    if ($branch->checkifavailable() == '1') {
        $_SESSION['messege'] = "This branch already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } else {
        $gym = unserialize($_SESSION['Gym']);
        if ($gym->addBranch($branch)) {
            echo "<script> window.location.href='../views/branch.php';</script>";
        } else {
            $_SESSION['errormessege']="There was a problem while Adding your branch";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}