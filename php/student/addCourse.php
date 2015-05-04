<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$courseId=$_POST["courseId"];
	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT CNUM FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "Fail:Course $courseId doesn't exist!";
		exit;
	}
	$cnum=$row["CNUM"];

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$courseId' AND SID='$userId'");
	if (!empty(mysql_fetch_array($result)))
	{
		echo "Fail:Course $courseId has been selected!";
		exit;
	}

	$result=mysql_query("SELECT COUNT(*) FROM SC WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if ($row[0]>=$cnum)
	{
		echo "Fail:There is no vacancy for course $courseId!";
		exit;
	}

	mysql_query("INSERT INTO SC(SID, CID) VALUES('$userId', '$courseId')");
	echo "Succeed:Course $courseId added!";
?>

