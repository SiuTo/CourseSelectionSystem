<?php
	session_start();
	if (!isset($_SESSION["userId"]))
	{
		echo '<script>alert("Login first please!");window.location.href="index.html";</script>';
		exit;
	}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Fudan Course Selection System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<script type="text/javascript" src="plugins/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="plugins/bootstrap/bootstrap.js"></script>
	<script type="text/javascript" src="js/student.js"></script>
</head>

<body>
	<div class="page-head">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Fudan Course Selection System</h1>
				</div>
				<div class="col-sm-4">
					<h2><a href="#">Student: <?php echo $_SESSION["userId"]; ?></a></h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container container-panels">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Operation panel</h3>
					</div>
					<div class="panel-body">
						<form class="operation-list" action="" method="get">
							<div class="form-group">
								<label for="courseId" class="control-label">Course Id</label>
								<input type="text" id="courseId" class="form-control" name="courseId">
							</div>
							<button type="button" class="btn btn-default" id="curriculum">Curriculum</button>
							<button type="button" class="btn btn-default" id="queryCourse">Query Course</button>
							<button type="button" class="btn btn-default" id="addCourse">Add Course</button>
							<button type="button" class="btn btn-default" id="dropCourse">Drop Course</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Course panel</h3>
					</div>
					<div id="showResultPanel" class="panel-body">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

