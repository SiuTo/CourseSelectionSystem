<?php
	require "../verifyUser.php";
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Fudan Course Selection System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../plugins/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../../css/index.css" />
	<script type="text/javascript" src="../../plugins/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="../../plugins/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/student.js"></script>
</head>

<body>
	<div class="page-head">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Fudan Course Selection System</h1>
				</div>
				<div class="col-sm-4">
					<div class="page-head-right">
						<div class="dropdown">
							<a id="dLabel" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
								<?php echo $_SESSION["userId"]; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li role="presentation"><a role="menuitem" href="profile.php">Profile</a></li>
								<li role="presentation"><a role="menuitem" href="../signout.php">Sign out</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container container-panels">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Personal Profile</h3>
					</div>

					<?php
						require "../ConnectDB.php";
						$result=mysql_query("SELECT SID, PASSWORD, SNAME, SBIRTH, SSEX, SYEAR, DNAME FROM STUDENT, DEPARTMENT WHERE SID='$_SESSION[userId]' AND STUDENT.DID=DEPARTMENT.DID");
						$row=mysql_fetch_array($result);
					?>

					<div class="panel-body">
						<form method="post" action="modify.php" class="form-horizontal">
							<div class="form-group">
								<label for="sid" class="col-sm-3 control-label">Student ID</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="sid" value="<?php echo $row["SID"];?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="oldPwd" class="col-sm-3 control-label">Old Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="oldPwd" id="oldPwd">
								</div>
							</div>
							<div class="form-group">
								<label for="newPwd" class="col-sm-3 control-label">New Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="newPwd" id="newPwd">
								</div>
							</div>
							<div class="form-group">
								<label for="newPwdRep" class="col-sm-3 control-label">Repeat New Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="newPwdRep" id="newPwdRep">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="name" name="name" value="<?php echo $row["SNAME"];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="birth" class="col-sm-3 control-label">Birth</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="birth" name="birth" value="<?php echo $row["SBIRTH"];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Gender</label>
								<div class="col-sm-7">
									<label class="radio-inline">
										<input name="gender" type="radio" value="M" <?php if ($row["SSEX"]=="M") echo "checked";?>>Male
									</label>
									<label class="radio-inline">
										<input name="gender" type="radio" value="F" <?php if ($row["SSEX"]=="F") echo "checked";?>>Female
									</label>
								</div>
							</div>
							<div class="form-group">
								<label for="year" class="col-sm-3 control-label">Registered in</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="year" value="<?php echo $row["SYEAR"];?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="department" class="col-sm-3 control-label">Department</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="department" value="<?php echo $row["DNAME"];?>" readonly>
								</div>
							</div>
							<button type="submit" class="btn btn-default col-sm-offset-3 col-sm-2">Submit</button>
							<button type="button" id="back" class="btn btn-default col-sm-offset-2 col-sm-2">back</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

