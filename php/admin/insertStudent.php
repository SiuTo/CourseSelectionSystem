<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$result=mysql_query("SELECT SID FROM STUDENT WHERE SID='$_POST[sid]'");
	if (!empty(mysql_fetch_array($result)))
	{
		echo "<script>alert('The student $_POST[sid] exists!');history.go(-1);</script>";
		exit;
	}
	
	mysql_query("INSERT INTO STUDENT(SID, PASSWORD, SNAME, SBIRTH, SSEX, SYEAR, DID) VALUES('$_POST[sid]', '$_POST[sid]', '$_POST[name]', '$_POST[birth]', '$_POST[gender]', '$_POST[year]', '$_POST[did]')");
	echo '<script>alert("Succeed!");window.location.href="stuAdd.php"</script>';
?>

