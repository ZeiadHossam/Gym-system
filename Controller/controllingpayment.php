<?php
include 'paymentmethod.php';

if (isset($_GET['add'])) {

    $payment=new paymentmethod();

    $payment->setname($_GET['payname']);

    if ($payment->addpaymentmethod()) {

    }

    else
    {
        echo "<script> alert('Cannot add payment');</script>";
    }

    unset($payment);


}
