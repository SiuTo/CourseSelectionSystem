<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$cid=$_POST["CID"];

	$result=mysql_query("SELECT STUDENT.SID, SNAME, SSEX FROM STUDENT, SC WHERE STUDENT.SID=SC.SID AND CID='$cid' ORDER BY STUDENT.SID ASC");
	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>#</th><th>Student Id</th><th>Student</th><th>Gender</th></tr></thead><tbody>";
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		if ($row["SSEX"]=="M") $gender="Male"; else $gender="Female";
		echo "<tr><td>$num</td><td>$row[SID]</td><td>$row[SNAME]</td><td>$gender</td></tr>";
	}
	echo '</tbody></table>';
?>

