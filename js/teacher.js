function loadList(courseId) {
	$("#alertModal .modal-title").text("Course "+courseId);
	$("#alertModal .modal-body").load(
		"studentList.php",
		{CID: courseId},
		function(){
			$("#alertModal").modal("toggle");
		}
	);
}

$(document).ready(function() {

	$("#back").click(function() {
		window.location.href="teacher.php";
	});

});

