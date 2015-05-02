<?php
	session_start();
	require "ConnectDB.php";

	$userId=$_SESSION["userId"];
	$courseId=$_POST["courseId"];

	$result=mysql_query("SELECT CNUM FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "<p>Fail: Course $courseId doesn't exist!</p>";
		exit;
	}

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$courseId' AND SID='$userId'");
	if (empty(mysql_fetch_array($result)))
	{
		echo "<p>Fail: Course $courseId has not been selected!</p>";
		exit;
	}

	mysql_query("DELETE FROM SC WHERE CID='$courseId' AND SID='$userId'");
	echo "<p>Succeed: Course $courseId dropped!</p>";
?>

