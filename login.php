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

	require "ConnectDB.php";

	if ($userType=="student")
	{
		$result=mysql_query("SELECT SID, PASSWORD FROM STUDENT WHERE SID='$userId'");
	}
	else if ($userType=="teacher")
	{
		$result=mysql_query("SELECT TID, PASSWORD FROM TEACHER WHERE TID='$userId'");
	}
	else if ($userType=="admin")
	{
		$result=mysql_query("SELECT AID, PASSWORD FROM ADMIN WHERE AID='$userId'");
	}
	else {
		echo "<script>alert('Illegal user type!'); history.go(-1);</script>";
		exit;
	}
	$info=mysql_fetch_array($result);
	if (empty($info))
	{
		echo "<script>alert('User doesn\'t exist!'); history.go(-1);</script>";
		exit;
	}
	if ($info['PASSWORD']!=$password)
	{
		echo "<script>alert('Wrong user ID or password!'); history.go(-1);</script>";
		exit;
	}
	session_start();
	$_SESSION["userId"]=$userId;
	header("Location: $userType.php");
?>

