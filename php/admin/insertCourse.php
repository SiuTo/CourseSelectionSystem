<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$result=mysql_query("SELECT CID FROM COURSE WHERE CID='$_POST[cid]'");
	if (!empty(mysql_fetch_array($result)))
	{
		echo "<script>alert('The course $_POST[cid] exists!');history.go(-1);</script>";
		exit;
	}
	
	mysql_query("INSERT INTO COURSE(CID, CNAME, CNUM, CREDIT, TID) VALUES('$_POST[cid]', '$_POST[name]', '$_POST[num]', '$_POST[credit]', '$_POST[tid]')");
	echo '<script>alert("Succeed!");window.location.href="courseAdd.php"</script>';
?>

