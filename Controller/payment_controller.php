<?php
include_once("../model/paymentmethod.php");
include_once("../model/gym.php");
if (isset($_GET['paymentEditId']) && isset($_GET['addpayment'])) {


} elseif (isset($_GET['paymentDeleteId'])) {


} elseif (isset($_GET['addpayment']) && !isset($_GET['paymentEditId'])) {

    session_start();

    $payment = new paymentmethod();
    $payment->setName(htmlentities($_GET['payname']));
   // if ($payment->checkifavailable() == '1') {
       // $_SESSION['messege'] = "This payment already exist";
      //  echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        $gym = unserialize($_SESSION['Gym']);
        if ($gym->addpayment($payment)) {
            echo "<script> window.location.href='../views/paymentmethod.php';</script>";
        } else{
            // $_SESSION['errormessege']="There was a problem while Adding your payment";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
   // }
}

