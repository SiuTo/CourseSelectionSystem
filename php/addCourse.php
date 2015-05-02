<?php
	session_start();
	require "ConnectDB.php";

	$result=mysql_query("SELECT CID FROM COURSE WHERE CID='$_POST[courseId]'");
	if (empty(mysql_fetch_array($result)))
	{
		echo "<p>Fail: Course $_POST[courseId] doesn't exist!</p>";
		exit;
	}

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$_POST[courseId]' AND SID='$_SESSION[userId]'");
	if (!empty(mysql_fetch_array($result)))
	{
		echo "<p>Fail: Course $_POST[courseId] has been selected!</p>";
		exit;
	}

	mysql_query("INSERT INTO SC(SID, CID) VALUES('$_SESSION[userId]', '$POST[courseId]')");
	echo "<p>Succeed: Course $_POST[courseId] added!</p>";
?>

