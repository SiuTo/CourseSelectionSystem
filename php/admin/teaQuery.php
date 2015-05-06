<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$tid=$_POST["tid"];
	$did=$_POST["did"];
	
	if ($tid!="")
	{
		$result=mysql_query("SELECT TNAME FROM TEACHER WHERE TID='$tid'");
		$row=mysql_fetch_array($result);
		if (empty($row))
		{
			echo '<script>alert("The teacher '.$tid.' doesn\'t exist!");</script>';
			exit;
		}
		echo "<div class='row'><h4 class='col-sm-6'>Teacher: $tid $row[TNAME]</h4>";
		echo "<div class='col-sm-offset-1 col-sm-2'><button class='btn btn-primary' onclick='editTeacher()'>Edit</button></div>";
		echo "<div class='col-sm-2'><button class='btn btn-danger' onclick='deleteTeacher()'>Delete</button></div></div>";

		require "../teacher/showCourse.php";
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

		$result=mysql_query("SELECT TID, TNAME, TSEX, TBIRTH, TTITLE FROM TEACHER WHERE DID='$did' GROUP BY TID ASC");
		echo '<table class="table table-striped">';
		echo '<thead><tr><th>#</th><th>Teacher Id</th><th>Teacher Name</th><th>Gender</th><th>Birth</th><th>Title</th></tr></thead><tbody>';
		$num=0;
		while ($row=mysql_fetch_array($result))
		{
			++$num;
			echo "<tr><td>$num</td><td>$row[TID]</td><td>$row[TNAME]</td><td>$row[TSEX]</td><td>$row[TBIRTH]</td><td>$row[TTITLE]</td></tr>";
		}
		echo '</tbody></table>';
	}
	else echo '<script>alert("Either teacher Id or department Id is required!");</script>';
?> 

