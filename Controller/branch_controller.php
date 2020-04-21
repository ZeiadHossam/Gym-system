<?php
include_once ('../model/branch.php');
include_once ('../model/gym.php');
session_start();
if(isset($_GET['branchEditId'])&&isset($_GET['addbranch']))
{
    $branch=new branch();
    $branch->setCity(htmlentities($_GET['branchCity']));
    $branch->setAddress(htmlentities($_GET['branchAddress']));
    $gym=unserialize($_SESSION['Gym']);
    $gym->editBranch($_GET['branchEditId'],$branch);
    echo "<script> window.location.href='../views/branch.php';</script>";
}
elseif (isset($_GET['branchDeleteId']))
{
    $gym=unserialize($_SESSION['Gym']);
    $gym->deleteBranch($_GET['branchDeleteId']);
    echo "<script> window.location.href='../views/branch.php';</script>";
}
elseif(isset($_GET['addbranch'])&&!isset($_GET['branchEditId']))
{
    $branch=new branch();
    $branch->setCity(htmlentities($_GET['branchCity']));
    $branch->setAddress(htmlentities($_GET['branchAddress']));
    $gym=unserialize($_SESSION['Gym']);
    $gym->addBranch($branch);
     echo "<script> window.location.href='../views/branch.php';</script>";

}