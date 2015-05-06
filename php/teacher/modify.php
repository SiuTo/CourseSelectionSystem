<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$userType=$_SESSION["userType"];
	if ($userType=="admin") $tid=$_POST["tid"];
	else $tid=$_SESSION["userId"];

	if ($userType=="teacher")
	{
		$result=mysql_query("SELECT PASSWORD FROM TEACHER WHERE TID='$tid'");
		$row=mysql_fetch_array($result);
		if ($row["PASSWORD"]!=$_POST["oldPwd"])
		{
			echo '<script>alert("Fail:\n\n\tWrong old password!");history.go(-1);</script>';
			exit;
		}

		if (!empty($_POST["newPwd"]))
		{
			if ($_POST["newPwd"]!=$_POST["newPwdRep"])
			{
				echo '<script>alert("Fail:\n\n\tThe two new passwords differ!");history.go(-1);</script>';
				exit;
			}
			mysql_query("UPDATE TEACHER SET PASSWORD='$_POST[newPwd]' WHERE TID='$tid'");
		}
	}

	mysql_query("UPDATE TEACHER SET TNAME='$_POST[name]', TBIRTH='$_POST[birth]', TSEX='$_POST[gender]' WHERE TID='$tid'");
	if ($userType=="admin")
	{
		mysql_query("UPDATE TEACHER SET TTITLE='$_POST[title]' WHERE TID='$tid'");
	}
	if ($userType=="admin") $url="profile.php?tid=$tid"; else $url="profile.php";
	echo '<script>alert("Succeed:\n\n\tUpdate profile successfully!");window.location.href="'.$url.'";</script>';
?>

