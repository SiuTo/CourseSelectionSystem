<?php
	session_start();
	require "../ConnectDB.php";

	$userId=$_SESSION["userId"];
	$courseId=$_POST["courseId"];

	$result=mysql_query("SELECT CNUM FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "Fail:Course $courseId doesn't exist!";
		exit;
	}

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$courseId' AND SID='$userId'");
	if (empty(mysql_fetch_array($result)))
	{
		echo "Fail:Course $courseId has not been selected!";
		exit;
	}

	mysql_query("DELETE FROM SC WHERE CID='$courseId' AND SID='$userId'");
	echo "Succeed:Course $courseId dropped!";
?>

