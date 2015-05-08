<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$result=mysql_query("SELECT TID FROM TEACHER WHERE TID='$_POST[tid]'");
	if (!empty(mysql_fetch_array($result)))
	{
		echo "<script>alert('The teacher $_POST[tid] exists!');history.go(-1);</script>";
		exit;
	}
	
	mysql_query("INSERT INTO TEACHER(TID, PASSWORD, TNAME, TBIRTH, TSEX, TTITLE, DID) VALUES('$_POST[tid]', '$_POST[tid]', '$_POST[name]', '$_POST[birth]', '$_POST[gender]', '$_POST[title]', '$_POST[did]')");
	echo '<script>alert("Succeed!");window.location.href="teaAdd.php"</script>';
?>

