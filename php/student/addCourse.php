<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	function timeToInterval($str)
	{
		$p1=strpos($str, " ");
		$p2=strpos($str, "-");
		$day=substr($str, 0, $p1);
		if ($day=="MON") $num=0;
		else if ($day=="TUE") $num=1;
		else if ($day=="WED") $num=2;
		else if ($day=="THU") $num=3;
		else if ($day=="FRI") $num=4;
		else if ($day=="SAT") $num=5;
		else if ($day=="SUN") $num=6;
		return array($num*13+substr($str, $p1+1, $p2-$p1-1)-1, $num*13+substr($str, $p2+1)-1);
	}

	$courseId=$_POST["courseId"];
	if ($_SESSION["userType"]=="admin") $sid=$_POST["sid"];
	else $sid=$_SESSION["userId"];

	$result=mysql_query("SELECT CNUM FROM COURSE WHERE CID='$courseId'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo "Fail:Course $courseId doesn't exist!";
		exit;
	}
	$cnum=$row["CNUM"];

	$result=mysql_query("SELECT CID FROM SC WHERE CID='$courseId' AND SID='$sid'");
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

	$result=mysql_query("SELECT TIME FROM SC, CSCHEDULE WHERE SID='$sid' AND SC.CID=CSCHEDULE.CID");
	$flag=array_fill(0, 7*13, false);
	while ($row=mysql_fetch_array($result))
	{
		$timeInterval=timeToInterval($row["TIME"]);
		for ($i=$timeInterval[0]; $i<=$timeInterval[1]; ++$i) $flag[$i]=true;
	}

	$result=mysql_query("SELECT TIME FROM CSCHEDULE WHERE CID='$courseId'");
	while ($row=mysql_fetch_array($result))
	{
		$timeInterval=timeToInterval($row["TIME"]);
		for ($i=$timeInterval[0]; $i<=$timeInterval[1]; ++$i)
			if ($flag[$i])
			{
				echo "Fail:There is time conflict for course $courseId!";
				exit;
			}
	}

	mysql_query("INSERT INTO SC(SID, CID) VALUES('$sid', '$courseId')");
	echo "Succeed:Course $courseId added!";
?>

