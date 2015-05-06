<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$cid=$_POST["cid"];
	
	mysql_query("DELETE FROM SC WHERE CID='$cid'");
	mysql_query("DELETE FROM CSCHEDULE WHERE CID='$cid'");
	mysql_query("DELETE FROM COURSE WHERE CID='$cid'");
?>

