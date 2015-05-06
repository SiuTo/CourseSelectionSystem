function alertResult(data, status) {
	var pos=data.indexOf(":");
	$("#alertModal .modal-title").text(data.slice(0, pos));
	$("#alertModal .modal-body").text(data.slice(pos+1));
	$("#alertModal").modal("toggle");
}

$("#curriculum").click(function() {
	$("#showResultPanel").load("curriculum.php");
});

$("#queryCourse").click(function() {
	$("#showResultPanel").load("queryCourse.php", {courseId: $("#courseId").val()});
});

$("#addCourse").click(function() {
	$.post("addCourse.php", {courseId: $("#courseId").val()}, alertResult);
	$("#showResultPanel").load("curriculum.php");
});

$("#dropCourse").click(function() {
	$.post("dropCourse.php", {courseId: $("#courseId").val()}, alertResult);
	$("#showResultPanel").load("curriculum.php");

});

