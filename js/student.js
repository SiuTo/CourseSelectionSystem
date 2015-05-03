$(document).ready(function() {

	$("#curriculum").click(function() {
		$("#showResultPanel").load("curriculum.php");
	});

	$("#queryCourse").click(function() {
		$("#showResultPanel").load("queryCourse.php", {courseId: $("#courseId").val()});
	});

	$("#addCourse").click(function() {
		$.post("addCourse.php",
			{courseId: $("#courseId").val()},
			function(data, status) {
				alert(data);
			}
		);
		$("#showResultPanel").load("curriculum.php");
	});

	$("#dropCourse").click(function() {
		$.post("dropCourse.php",
			{courseId: $("#courseId").val()},
			function(data, status) {
				alert(data);
			}
		);
		$("#showResultPanel").load("curriculum.php");

	});

});

