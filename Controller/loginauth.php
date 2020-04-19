<?php
if (isset($_GET['login'])) 
{
	include '../Model/employee.php';
	session_start();
	$username=$_GET['username'];
	$password=$_GET['password'];
	if (employee::login($username,$password))
	{
		
		header("Location:../views/index.php");
	}
	else 
	{
		echo "<script> window.location.href='../views/login.php';</script>";
		echo "<script>alert('Invalid UserName or Password')</script>";

	}
	
}
if(!isset($_SESSION['id']))
{
	echo "<script> window.location.href='views/login.php';</script>";
}

?>