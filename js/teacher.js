function loadList(courseId) {
	$("#alertModal .modal-title").text("Course "+courseId);
	$("#alertModal .modal-body").load(
		"studentList.php",
		{cid: courseId},
		function(){
			$("#alertModal").modal("toggle");
		}
	);
}

$("#back").click(function() {
	window.location.href="teacher.php";
});

