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
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#student" aria-controls="student" role="tab" data-toggle="tab">Student</a></li>
				<li role="presentation"><a href="#teacher" aria-controls="teacher" role="tab" data-toggle="tab">Teacher</a></li>
				<li role="presentation"><a href="#course" aria-controls="Course" role="tab" data-toggle="tab">Course</a></li>
			</ul>

			<div class="tab-content container-body">
				<div id="alertModal" class="modal fade">
					<div class="modal-dialog">
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

				<div role="tabpanel" class="tab-pane active" id="student">
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Operation panel</h3>
								</div>
								<div class="panel-body">
									<form class="form">
										<div class="form-group">
											<label for="stuSid" class="control-label">Student Id</label>
											<input type="text" id="stuSid" class="form-control">
										</div>
										<div class="form-group">
											<label for="stuDid" class="control-label">Department Id</label>
											<input type="text" id="stuDid" class="form-control">
										</div>
										<button type="button" class="btn btn-default" id="stuQuery">Query</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Student Panel</h3>
								</div>
								<div id="showResultPanel-stu" class="panel-body">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="teacher">
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Operation panel</h3>
								</div>
								<div class="panel-body">
									<form class="form">
										<div class="form-group">
											<label for="teaTid" class="control-label">Teacher Id</label>
											<input type="text" id="teaTid" class="form-control">
										</div>
										<div class="form-group">
											<label for="teaDid" class="control-label">Department Id</label>
											<input type="text" id="teaDid" class="form-control">
										</div>
										<button type="button" class="btn btn-default" id="teaQuery">Query</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Teacher Panel</h3>
								</div>
								<div id="showResultPanel-tea" class="panel-body">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="course">
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Operation panel</h3>
								</div>
								<div class="panel-body">
									<form class="form">
										<div class="form-group">
											<label for="courseCid" class="control-label">Course Id</label>
											<input type="text" id="courseCid" class="form-control">
										</div>
										<div class="form-group">
											<label for="courseDid" class="control-label">Department Id</label>
											<input type="text" id="courseDid" class="form-control">
										</div>
										<button type="button" class="btn btn-default" id="courseQuery">Query</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Course Panel</h3>
								</div>
								<div id="showResultPanel-course" class="panel-body">
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../js/admin.js"></script>
</body>

</html>

