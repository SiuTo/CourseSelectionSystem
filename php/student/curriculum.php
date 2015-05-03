<?php
	session_start();
	require "../ConnectDB.php";

	$result=mysql_query("SELECT COURSE.CID, CNAME, TNAME FROM SC, COURSE, TEACHER WHERE SID='$_SESSION[userId]' AND COURSE.CID=SC.CID AND COURSE.TID=TEACHER.TID");
	echo '<table class="table table-striped">';
	echo '<thead><tr><th>#</th><th>Course Id</th><th>Course Name</th><th>Teacher Name</th></tr></thead><tbody>';
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td>$row[CID]</td><td>$row[CNAME]</td><td>$row[TNAME]</td></tr>";
	}
	echo '</tbody></table>';
?>

