<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$courseId=$_POST["courseId"];
	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT CID, CNAME, TNAME, CREDIT, CNUM FROM COURSE, TEACHER WHERE CID LIKE '$courseId%' AND COURSE.TID=TEACHER.TID ORDER BY CID ASC");
	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>#</th><th>Course Id</th><th>Course Name</th><th>Credit</th><th>Teacher</th><th>Vacancy</th></tr></thead><tbody>";
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		$cnt=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM SC WHERE CID='$row[CID]'"))[0];
		$vacancy=$row[CNUM]-$cnt;
		$whenAndWhere=mysql_query("SELECT TIME, PLACE FROM CSCHEDULE WHERE CID='$row[CID]'");
		$data="";
		while ($row1=mysql_fetch_array($whenAndWhere))
			$data.="$row1[TIME] $row1[PLACE]<br>";
		echo "<tr><td>$num</td><td><a data-html='true' data-placement='right' title='When and Where' data-content='$data' data-toggle='popover' onmouseover='$(this).popover(\"show\")' onmouseout='$(this).popover(\"hide\")'>$row[CID]</a></td><td>$row[CNAME]</td><td>$row[CREDIT]</td><td>$row[TNAME]</td><td>$vacancy</td></tr>";
	}
	echo '</tbody></table>';
?>

