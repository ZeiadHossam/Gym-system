<?php
if (isset($_GET['login'])) 
{
	include 'employee.php';
	session_start();
	$username=$_GET['username'];
	$password=$_GET['password'];
	if (employee::login($username,$password))
	{
		
		header("Location:../index.php");
	}
	else 
	{
		echo "<script> window.location.href='../login.php';</script>";
		echo "<script>alert('Invalid UserName or Password')</script>";

	}
	
}
if(!isset($_SESSION['id']))
{
	echo "<script> window.location.href='login.php';</script>";
}

?>