<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$courseId=$_POST["courseId"];
	if ($_SESSION["userType"]=="admin") $sid=$_POST["sid"];
	else $sid=$_SESSION["userId"];

	$result=mysql_query("SELECT CNUM FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "Fail:Course $courseId doesn't exist!";
		exit;
	}

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$courseId' AND SID='$sid'");
	if (empty(mysql_fetch_array($result)))
	{
		echo "Fail:Course $courseId has not been selected!";
		exit;
	}

	mysql_query("DELETE FROM SC WHERE CID='$courseId' AND SID='$sid'");
	echo "Succeed:Course $courseId dropped!";
?>

