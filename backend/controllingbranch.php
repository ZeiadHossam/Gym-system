<?php
include_once 'branch.php';
if (isset($_GET['addbranch']))
{
$branch =new branch();
$branch->setName($_GET['branchName']);
$branch->setAddress($_GET['branchAddress']);
    if (branch::addbranch($branch)) {
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else
    {
        echo "<script> alert('Cannot add Branch');</script>";
    }

    unset($branch);
}