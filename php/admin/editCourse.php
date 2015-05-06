<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$cid=$_POST["cid"];

	mysql_query("UPDATE COURSE SET CNAME='$_POST[cname]', CNUM='$_POST[cnum]', CREDIT='$_POST[credit]', TID='$_POST[tid]' WHERE CID='$cid'");
	echo '<script>alert("Succeed:\n\n\tUpdate profile successfully!");window.location.href="courseInfo.php?cid='.$cid.'";</script>';
?>

