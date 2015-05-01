<?php
	if (empty($_POST["userId"]))
	{
		echo "<script>alert('User Id is required!'); history.go(-1);</script>";
		exit;
	}
	if (empty($_POST["password"]))
	{
		echo "<script>alert('Password is required!'); history.go(-1);</script>";
		exit;
	}
	$userId=$_POST["userId"];
	$password=$_POST["password"];
	$userType=$_POST["userType"];
	if ($userType=="student")
	{
	}
	else if ($userType=="teacher")
	{
	}
	else if ($userType=="admin")
	{
	}
	else {
		echo "<script>alert('Illegal user type!'); history.go(-1);</script>";
		exit;
	}
	session_start();
	$_SESSION["userId"]=$userId;
	header("Location: $userType.php");
?>

