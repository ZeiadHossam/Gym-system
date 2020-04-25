<?php
include_once("../model/package.php");
include_once("../model/gym.php");
session_start();
$gym = unserialize($_SESSION['Gym']);
if (isset($_GET['packageEditId']) && isset($_GET['addPackage'])) {
    $gym->getPackages()[$_GET['packageEditId']]->setName(htmlentities($_GET['packageName']));
    $gym->getPackages()[$_GET['packageEditId']]->setPeriodType(htmlentities($_GET['periodType']));
    $id=0;
    if ($gym->getPackages()[$_GET['packageEditId']]->checkifavailable(($gym->getId())) == '1') {
        $_SESSION['messege'] = "This package already exist";

        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else{
        if ($gym->getPackages()[$_GET['packageEditId']]->deleteAllPeriods()) {
            foreach ($_GET['contractTypes'] as $type) {
                $packageperiod = new packagePeriod();
                $packageperiod->setPeriod($type);
                $id = $id + 1;
                $gym->getPackages()[$_GET['packageEditId']]->setPeriodArray($id, $packageperiod);
            }
            if ($gym->getPackages()[$_GET['packageEditId']]->addPeriods()) {
                if ($gym->editPackage($_GET['packageEditId'])) {
                    $_SESSION['successMessege'] = "Edited Successfully";
                    echo "<script> window.location.href='../views/package.php';</script>";
                }
                else {
                    $_SESSION['errormessege'] = "There was a problem while Editing your package";
                    echo "<script> window.location.href='javascript:history.go(-1)';</script>";
                }

            }
            else {
                $_SESSION['errormessege'] = "There was a problem while Editing your package";
                echo "<script> window.location.href='javascript:history.go(-1)';</script>";
            }
        }
        else {
            $_SESSION['errormessege'] = "There was a problem while Editing your package";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }

} elseif (isset($_GET['packageDeleteId'])) {
    if ($gym->deletePackage($_GET['packageDeleteId']))
    {
        $packages=$gym->getPackages();
        unset($packages[$_GET['packageDeleteId']]);
        $gym->setAllPackages($packages);
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Deleted Successfully";
        echo "<script> window.location.href='../views/package.php';</script>";
    }
    else
    {
        $_SESSION['errormessege'] = "can't' delete this Package right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }


} elseif (isset($_GET['addPackage']) && !isset($_GET['packageEditId'])) {
    $package = new package('array');
    $package->setName($_GET['packageName']);
    $package->setPeriodType($_GET['periodType']);
    $id=0;
    foreach ($_GET['contractTypes'] as $type) {
        $packageperiod=new packagePeriod();
        $packageperiod->setPeriod($type);
        $id=$id+1;
        $package->setPeriodArray($id,$packageperiod);
    }

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