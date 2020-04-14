<?php
include '../Model/paymentmethod.php';

if (isset($_GET['add'])) {

    $payment=new paymentmethod();

    $payment->setname($_GET['payname']);

    if ($payment->addpaymentmethod()) {
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }

    else
    {
        echo "<script> alert('Cannot add payment');</script>";
    }

    unset($payment);


}
