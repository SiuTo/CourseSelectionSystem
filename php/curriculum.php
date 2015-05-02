<?php
	session_start();
	require "ConnectDB.php";

	$result=mysql_query("SELECT COURSE.CID, CNAME FROM SC, COURSE WHERE SID='$_SESSION[userId]' AND COURSE.CID=SC.CID");
	echo '<table class="table table-striped">';
	echo '<thead><tr><th>#</th><th>Course Id</th><th>Course Name</th></tr></thead><tbody>';
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td>$row[CID]</td><td>$row[CNAME]</td></tr>";
	}
	echo '</tbody></table>';
?>

