<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$userId=$_SESSION["userId"];

	$result=mysql_query("SELECT PASSWORD, SNAME, SBIRTH, SSEX FROM STUDENT WHERE SID='$userId'");
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
		mysql_query("UPDATE STUDENT SET PASSWORD='$_POST[newPwd]' WHERE SID='$userId'");
	}

	mysql_query("UPDATE STUDENT SET SNAME='$_POST[name]', SBIRTH='$_POST[birth]', SSEX='$_POST[gender]' WHERE SID='$userId'");
	echo '<script>alert("Succeed:\n\n\tUpdate profile successfully!");window.location.href="profile.php";</script>';
?>

