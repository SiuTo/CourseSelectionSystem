<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$sid=$_POST["sid"];
	$did=$_POST["did"];
	
	if ($sid!="")
	{
		$result=mysql_query("SELECT SNAME FROM STUDENT WHERE SID='$sid'");
		$row=mysql_fetch_array($result);
		if (empty($row))
		{
			echo '<script>alert("The student '.$sid.' doesn\'t exist!");</script>';
			exit;
		}
		echo "<h4>Student: $sid $row[SNAME]</h4>";

		require "../student/curriculum.php";

		echo '<form class="form-inline">
			<div class="form-group">
				<label for="courseId">Course Id</label>
				<input type="text" class="form-control" id="courseId">
			</div>
			<button type="button" onclick="addStuCourse()" class="btn btn-default">Add</button>
			<button type="button" onclick="dropStuCourse()" class="btn btn-default">Drop</button>
		</form>';

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

		$result=mysql_query("SELECT SID, SNAME, SSEX, SBIRTH, SYEAR FROM STUDENT WHERE DID='$did' GROUP BY SID ASC");
		echo '<table class="table table-striped">';
		echo '<thead><tr><th>#</th><th>Student Id</th><th>Student Name</th><th>Gender</th><th>Birth</th><th>Registration Year</th></tr></thead><tbody>';
		$num=0;
		while ($row=mysql_fetch_array($result))
		{
			++$num;
			echo "<tr><td>$num</td><td>$row[SID]</td><td>$row[SNAME]</td><td>$row[SSEX]</td><td>$row[SBIRTH]</td><td>$row[SYEAR]</td></tr>";
		}
		echo '</tbody></table>';

	}
	else echo '<script>alert("Either student Id or department Id is required!");</script>';
?> 

