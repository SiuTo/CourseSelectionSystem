<?php
	session_start();
	require "../ConnectDB.php";

	$cid=$_GET["CID"];
	echo $cid;

	$result=mysql_query("SELECT STUDENT.SID, SNAME FROM STUDENT, SC WHERE STUDENT.SID=SC.SID AND CID='$cid'");
	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>#</th><th>Student Id</th><th>Student Name</th></tr></thead><tbody>";
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td>$row[SID]</td><td>$row[SNAME]</td></tr>";
	}
	echo '</tbody></table>';
?>
