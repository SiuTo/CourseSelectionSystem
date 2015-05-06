<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$sid=$_POST["sid"];
	
	mysql_query("DELETE FROM SC WHERE SID='$sid'");
	mysql_query("DELETE FROM STUDENT WHERE SID='$sid'");
?>

