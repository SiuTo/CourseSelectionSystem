<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$cid=$_POST["cid"];

	$result=mysql_query("SELECT STUDENT.SID, SNAME, SSEX, DNAME FROM STUDENT, SC, DEPARTMENT WHERE STUDENT.SID=SC.SID AND CID='$cid' AND STUDENT.DID=DEPARTMENT.DID ORDER BY STUDENT.SID ASC");
	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>#</th><th>Student Id</th><th>Student</th><th>Gender</th><th>Department</th></tr></thead><tbody>";
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		if ($row["SSEX"]=="M") $gender="Male"; else $gender="Female";
		echo "<tr><td>$num</td><td>$row[SID]</td><td>$row[SNAME]</td><td>$gender</td><td>$row[DNAME]</td></tr>";
	}
	echo '</tbody></table>';
?>

