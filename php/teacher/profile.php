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

	<div class="container container-body">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Personal Profile</h3>
					</div>

					<?php
						require "../ConnectDB.php";
						if ($_SESSION["userType"]=="admin") $tid=$_GET["tid"]; else $tid=$_SESSION["userId"];
						$result=mysql_query("SELECT TID, PASSWORD, TNAME, TBIRTH, TSEX, TTITLE, DNAME FROM TEACHER, DEPARTMENT WHERE TID='$tid' AND TEACHER.DID=DEPARTMENT.DID");
						$row=mysql_fetch_array($result);
					?>

					<div class="panel-body">
						<form method="post" action="modify.php" class="form-horizontal">
							<div class="form-group">
								<label for="tid" class="col-sm-3 control-label">Teacher ID</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="tid" id="tid" value="<?php echo $row["TID"];?>" readonly>
								</div>
							</div>

							<?php if ($_SESSION["userType"]=="teacher") echo '
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
							';?>
							<div class="form-group">
								<label for="name" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="name" name="name" value="<?php echo $row["TNAME"];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="birth" class="col-sm-3 control-label">Birth</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="birth" name="birth" value="<?php echo $row["TBIRTH"];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Gender</label>
								<div class="col-sm-7">
									<label class="radio-inline">
										<input name="gender" type="radio" value="M" <?php if ($row["TSEX"]=="M") echo "checked";?>>Male
									</label>
									<label class="radio-inline">
										<input name="gender" type="radio" value="F" <?php if ($row["TSEX"]=="F") echo "checked";?>>Female
									</label>
								</div>
							</div>
							<div class="form-group">
								<label for="title" class="col-sm-3 control-label">Title</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="title" id="title" value="<?php echo $row["TTITLE"];?>" <?php if ($_SESSION["userType"]!="admin") echo "readonly"; ?>>
								</div>
							</div>
							<div class="form-group">
								<label for="department" class="col-sm-3 control-label">Department</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="department" id="department" value="<?php echo $row["DNAME"];?>" <?php if ($_SESSION["userType"]!="admin") echo "readonly"; ?>>
								</div>
							</div>
							<button type="submit" class="btn btn-default col-sm-offset-3 col-sm-2">Submit</button>
							<button type="button" onclick="window.location.href='<?php if ($_SESSION[userType]=="admin") echo '../admin/admin.php'; else echo 'teacher.php';?>'" class="btn btn-default col-sm-offset-2 col-sm-2">Back</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../js/teacher.js"></script>
</body>

</html>

