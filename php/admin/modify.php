<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$userType=$_SESSION["userType"];
	$aid=$_SESSION["userId"];

	$result=mysql_query("SELECT PASSWORD FROM ADMIN WHERE AID='$aid'");
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
		mysql_query("UPDATE ADMIN SET PASSWORD='$_POST[newPwd]' WHERE AID='$aid'");
	}

	mysql_query("UPDATE ADMIN SET ANAME='$_POST[name]', ABIRTH='$_POST[birth]', ASEX='$_POST[gender]' WHERE AID='$aid'");
	echo '<script>alert("Succeed:\n\n\tUpdate profile successfully!");window.location.href="profile.php";</script>';
?>

