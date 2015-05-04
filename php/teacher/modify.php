<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT PASSWORD, TNAME, TBIRTH, TSEX FROM TEACHER WHERE TID='$userId'");
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
		mysql_query("UPDATE TEACHER SET PASSWORD='$_POST[newPwd]' WHERE TID='$userId'");
	}

	mysql_query("UPDATE TEACHER SET TNAME='$_POST[name]', TBIRTH='$_POST[birth]', TSEX='$_POST[gender]' WHERE TID='$userId'");
	echo '<script>alert("Succeed:\n\n\tUpdate profile successfully!");window.location.href="profile.php";</script>';
?>

