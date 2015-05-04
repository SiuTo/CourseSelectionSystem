<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	if ($_SESSION["userType"]=="admin") $sid=$_POST["sid"];
	else $sid=$_SESSION["userId"];

	$result=mysql_query("SELECT COURSE.CID, CNAME, TNAME FROM SC, COURSE, TEACHER WHERE SID='$sid' AND COURSE.CID=SC.CID AND COURSE.TID=TEACHER.TID ORDER BY COURSE.CID ASC");
	echo '<table class="table table-striped">';
	echo '<thead><tr><th>#</th><th>Course Id</th><th>Course Name</th><th>Teacher</th></tr></thead><tbody>';
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td>$row[CID]</td><td>$row[CNAME]</td><td>$row[TNAME]</td></tr>";
	}
	echo '</tbody></table>';
?>

