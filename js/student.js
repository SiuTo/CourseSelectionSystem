$(document).ready(function() {

	$("#curriculum").click(function() {
		$("#showResultPanel").load("php/curriculum.php");
	});

	$("#addCourse").click(function() {
		$("#showResultPanel").load("php/addCourse.php", {courseId: $("#courseId").val()});
	});
});

