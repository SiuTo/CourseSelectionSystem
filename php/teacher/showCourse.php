<?php
	session_start();
	require "../ConnectDB.php";

	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT CID, CNAME, CREDIT, CNUM FROM COURSE, TEACHER WHERE COURSE.TID=TEACHER.TID AND TEACHER.TID=$userId");
	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>#</th><th>Course Id</th><th>Course Name</th><th>Credit</th><th>Available</th><th>Number of Students</th></tr></thead><tbody>";
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		$cnt=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM SC WHERE CID='$row[CID]'"))[0];
		echo "<tr><td>$num</td><td>$row[CID]</td><td>$row[CNAME]</td><td>$row[CREDIT]</td><td>$row[CNUM]</td>"
			."<td><a href='#' onclick='loadList(\"$row[CID]\")'>$cnt</a></td></tr>";
	}
	echo '</tbody></table>';
?>

