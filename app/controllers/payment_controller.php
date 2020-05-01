<?php
include_once("../model/paymentmethod.php");
include_once("../model/gym.php");
    session_start();
    $gym = unserialize($_SESSION['Gym']);

if (isset($_GET['paymentEditId']) && isset($_GET['addpayment'])) {
    $gym->getPaymentMethods()[$_GET['paymentEditId']]->setName(htmlentities($_GET['payname']));
    if ($gym->getPaymentMethods()[$_GET['paymentEditId']]->checkifavailable(($gym->getId())) == '1') {
        $_SESSION['messege'] = "This payment already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else
    {
        if ($gym->editPaymentMedthod($_GET['paymentEditId'])) {
            $_SESSION['successMessege'] = "Edited Successfully";
            echo "<script> window.location.href='../views/paymentmethod.php';</script>";
        } else {
            $_SESSION['errormessege']="There was a problem while Editing Payment";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }


} elseif (isset($_GET['paymentDeleteId'])) {
    if ($gym->deletePaymentMethod($_GET['paymentDeleteId']))
    {
        $Payments=$gym->getPaymentMethods();
        unset($Payments[$_GET['paymentDeleteId']]);
        $gym->setAllPaymentMethods($Payments);
        $_SESSION['Gym'] = serialize($gym);
        $_SESSION['successMessege'] = "Deleted Successfully";
        echo "<script> window.location.href='../views/paymentmethod.php';</script>";
    }
    else
    {
        $_SESSION['errormessege'] = "can't' delete this PaymentMethod right now";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }

} elseif (isset($_GET['addpayment']) && !isset($_GET['paymentEditId'])) {


    $payment = new paymentmethod();
    $payment->setName(htmlentities($_GET['payname']));
    if ($payment->checkifavailable(($gym->getId())) == '1') {
        $_SESSION['messege'] = "This payment already exist";

        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else {
        if ($gym->addpayment($payment)) {
            $_SESSION['successMessege'] = "Added successfully";
            echo "<script> window.location.href='../views/paymentmethod.php';</script>";
        } else {
            $_SESSION['errormessege'] = "There was a problem while Adding your payment";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}

