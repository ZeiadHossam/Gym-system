<?php
include_once ("../model/employee.php");
include_once ("../model/gym.php");
include_once ("../model/system.php");
if (isset($_GET['login']))
{
    $username=$_GET['username'];
    $password=$_GET['password'];
    if($username=="system"&&$password=="system")
    {

        session_start();
        $_SESSION['id']=-1;
        echo "<script> window.location.href='../views/register.php';</script>";

    }
    else {
        session_start();
        $loggedInInfo = employee::login($username, md5($password));
        if ($loggedInInfo != NULL) {
            if(system::checkGymActivity($loggedInInfo['branchId'],$loggedInInfo['id']))
            {

            $gym=system::getGymdata($loggedInInfo);
            $_SESSION['id'] = $loggedInInfo['id'];
            $_SESSION['branch'] = $loggedInInfo['branchId'];
            $_SESSION['Gym'] = serialize($gym);
            header("Location:../views/index.php");
            }
            else
            {

                $_SESSION['messege']="Gym is not Active";
                echo "<script> window.location.href='javascript:history.go(-1)';</script>";

            }
        } else {
            $_SESSION['messege']="Invalid UserName or Password";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";

        }
    }
	
}
if(!isset($_SESSION['id']))
{
	echo "<script> window.location.href='../views/login.php';</script>";
}

?>