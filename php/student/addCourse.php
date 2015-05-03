<?php
	session_start();
	require "../ConnectDB.php";

	$courseId=$_POST["courseId"];
	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT CNUM FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "Fail:\n\n\tCourse $courseId doesn't exist!";
		exit;
	}
	$cnum=$row["CNUM"];

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$courseId' AND SID='$userId'");
	if (!empty(mysql_fetch_array($result)))
	{
		echo "Fail:\n\n\tCourse $courseId has been selected!";
		exit;
	}

	$result=mysql_query("SELECT COUNT(*) FROM SC WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if ($row[0]>=$cnum)
	{
		echo "Fail:\n\n\tThere is no vacancy for course $courseId!";
		exit;
	}

	mysql_query("INSERT INTO SC(SID, CID) VALUES('$userId', '$courseId')");
	echo "Succeed:\n\n\tCourse $courseId added!";
?>

