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
			<div class="col-sm-4">
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
			<div class="col-sm-8">
				<div id="alertModal" class="modal fade">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"></h4>
							</div>
							<div class="modal-body"></div>
						</div>
					</div>
				</div>

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
	<script type="text/javascript" src="../../js/student.js"></script>
</body>

</html>

