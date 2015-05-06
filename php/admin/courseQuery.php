<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$cid=$_POST["cid"];
	$did=$_POST["did"];
	
	if ($cid!="")
	{
		$result=mysql_query("SELECT CNAME FROM COURSE WHERE CID='$cid'");
		$row=mysql_fetch_array($result);
		if (empty($row))
		{
			echo '<script>alert("The course '.$tid.' doesn\'t exist!");</script>';
			exit;
		}
		echo "<div class='row'><h4 class='col-sm-3'>course: $tid $row[CNAME]</h4>";
		echo "<div class='col-sm-1'><button class='btn btn-primary' onclick='dropCourse()'>Edit</button></div>";
		echo "<div class='col-sm-1'><button class='btn btn-danger' onclick='deleteCourse()'>Delete</button></div></div>";

		require "../teacher/studentList.php";

	}else
	if ($did!="")
	{
		$result=mysql_query("SELECT DNAME FROM DEPARTMENT WHERE DID='$did'");
		$row=mysql_fetch_array($result);
		if (empty($row))
		{
			echo '<script>alert("The department '.$did.' doesn\'t exist!");</script>';
			exit;
		}
		echo "<h4>Department: $did $row[DNAME]</h4>";

		$result=mysql_query("SELECT CID, CNAME, CREDIT, CNUM, TNAME FROM COURSE, TEACHER WHERE DID='$did' AND COURSE.TID=TEACHER.TID GROUP BY CID ASC");
		echo '<table class="table table-striped">';
		echo '<thead><tr><th>#</th><th>Course Id</th><th>Course Name</th><th>Credit</th><th>Available</th><th>Teacher</th></tr></thead><tbody>';
		$num=0;
		while ($row=mysql_fetch_array($result))
		{
			++$num;
			echo "<tr><td>$num</td><td>$row[CID]</td><td>$row[CNAME]</td><td>$row[CREDIT]</td><td>$row[CNUM]</td><td>$row[TNAME]</td></tr>";
		}
		echo '</tbody></table>';
	}
	else echo '<script>alert("Either course Id or department Id is required!");</script>';
?> 

