<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$userType=$_SESSION["userType"];
	if ($userType=="admin") $sid=$_POST["sid"];
	else $sid=$_SESSION["userId"];

	if ($userType=="student")
	{
		$result=mysql_query("SELECT PASSWORD FROM STUDENT WHERE SID='$sid'");
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
			mysql_query("UPDATE STUDENT SET PASSWORD='$_POST[newPwd]' WHERE SID='$sid'");
		}
	}

	mysql_query("UPDATE STUDENT SET SNAME='$_POST[name]', SBIRTH='$_POST[birth]', SSEX='$_POST[gender]' WHERE SID='$sid'");
	if ($userType=="admin")
	{
		mysql_query("UPDATE STUDENT SET SYEAR='$_POST[year]' WHERE SID='$sid'");
	}
	if ($userType=="admin") $url="profile.php?sid=$sid"; else $url="profile.php";
	echo '<script>alert("Succeed:\n\n\tUpdate profile successfully!");window.location.href="'.$url.'";</script>';
?>

