<?php
	session_start();
	require "ConnectDB.php";

	$courseId=$_POST["courseId"];
	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT CNUM, CNAME FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "<p>Fail: Course $courseId doesn't exist!</p>";
		exit;
	}
	$cname=$row["CNAME"];
	$num=$row["CNUM"];

	$result=mysql_query("SELECT COUNT(*) FROM SC WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	$vacancy=$num-$row[0];

	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>Course Id</th><th>Course Name</th><th>Vacancy</th></tr></thead>";
	echo "<tbody><tr><td>$courseId</td><td>$cname</td><td>$vacancy</td></tr></tbody></table>";
?>

