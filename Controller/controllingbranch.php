<?php
include_once '../Model/branch.php';
if (isset($_GET['addbranch']))
{
$branch =new branch();
$branch->setName($_GET['branchName']);
$branch->setAddress($_GET['branchAddress']);
    if ($branch->addbranch()) {
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else
    {
        echo "<script> alert('Cannot add Branch');</script>";
    }

    unset($branch);
}