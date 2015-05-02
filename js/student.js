$(document).ready(function() {

	$("#curriculum").click(function() {
		$("#showResultPanel").load("php/curriculum.php");
	});

	$("#queryCourse").click(function() {
		$("#showResultPanel").load("php/queryCourse.php", {courseId: $("#courseId").val()});
	});

	$("#addCourse").click(function() {
		$("#showResultPanel").load("php/addCourse.php", {courseId: $("#courseId").val()});
	});

	$("#dropCourse").click(function() {
		$("#showResultPanel").load("php/dropCourse.php", {courseId: $("#courseId").val()});
	});

});

