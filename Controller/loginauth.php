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
            $gym=system::getGymdata($loggedInInfo);
            $_SESSION['id'] = $loggedInInfo['id'];
            $_SESSION['branch'] = $loggedInInfo['branchId'];
            $_SESSION['Gym'] = serialize($gym);
            header("Location:../views/index.php");
        } else {
            echo "<script>alert('Invalid UserName or Password')</script>";
            echo "<script> window.location.href='../views/login.php';</script>";

        }
    }
	
}
if(!isset($_SESSION['id']))
{
	echo "<script> window.location.href='../views/login.php';</script>";
}

?>