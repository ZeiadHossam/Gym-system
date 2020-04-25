<?php
include_once("../model/package.php");
include_once("../model/gym.php");
session_start();
$gym = unserialize($_SESSION['Gym']);
if (isset($_GET['packageEditId']) && isset($_GET['addPackage'])) {



} elseif (isset($_GET['packageDeleteId'])) {



} elseif (isset($_GET['addPackage']) && !isset($_GET['packageEditId'])) {


    foreach ($_GET['contractTypes'] as $type) {
        $package = new package();
        $package->setPeriodType($_GET['periodType']);
        $package->setName($_GET['packageName']);
        $package->setPeriod($type);

        if ($package->checkifavailable(($gym->getId())) == '1') {
            $_SESSION['messege'] = "This package already exist";

            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        } else {
            if ($gym->addPackage($package)) {
                $_SESSION['successMessege'] = "Added successfully";
                echo "<script> window.location.href='../views/package.php';</script>";
            } else {
                $_SESSION['errormessege'] = "There was a problem while Adding your package";
                echo "<script> window.location.href='javascript:history.go(-1)';</script>";
            }
        }
    }
}