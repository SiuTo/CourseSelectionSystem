<?php
	session_start();
	require "ConnectDB.php";

	$courseId=$_POST["courseId"];
	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT CNUM FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "<p>Fail: Course $courseId doesn't exist!</p>";
		exit;
	}
	$cnum=$row["CNUM"];

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$courseId' AND SID='$userId'");
	if (!empty(mysql_fetch_array($result)))
	{
		echo "<p>Fail: Course $courseId has been selected!</p>";
		exit;
	}

	$result=mysql_query("SELECT COUNT(*) FROM SC WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if ($row[0]>=$cnum)
	{
		echo "<p>Fail: There is no vacancy for course $courseId!</p>";
		exit;
	}

	mysql_query("INSERT INTO SC(SID, CID) VALUES('$userId', '$courseId')");
	echo "<p>Succeed: Course $courseId added!</p>";
?>

