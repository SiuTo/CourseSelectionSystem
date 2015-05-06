$("#stuQuery").click(function() {
	$("#showResultPanel-stu").load(
		"stuQuery.php",
		{
			sid: $("#stuSid").val(),
			did: $("#stuDid").val()
		}
	);
});

function alertResult(data, status) {
	var pos=data.indexOf(":");
	$("#alertModal .modal-title").text(data.slice(0, pos));
	$("#alertModal .modal-body").text(data.slice(pos+1));
	$("#alertModal").modal("toggle");
}

function addStuCourse() {
	$.post("../student/addCourse.php",
		{
			sid: $("#stuSid").val(),
			courseId: $("#courseId").val()
		},
		alertResult
	);

	$("#showResultPanel-stu").load(
		"stuQuery.php",
		{
			sid: $("#stuSid").val(),
			did: ""
		}
	);
}

function dropStuCourse() {
	$.post("../student/dropCourse.php",
		{
			sid: $("#stuSid").val(),
			courseId: $("#courseId").val()
		},
		alertResult
	);

	$("#showResultPanel-stu").load(
		"stuQuery.php",
		{
			sid: $("#stuSid").val(),
			did: ""
		}
	);
}

$("#teaQuery").click(function() {
	$("#showResultPanel-tea").load(
		"teaQuery.php",
		{
			tid: $("#teaTid").val(),
			did: $("#teaDid").val()
		}
	);
});

function loadList(courseId) {
	$("#alertModal .modal-title").text("Course "+courseId);
	$("#alertModal .modal-body").load(
		"../teacher/studentList.php",
		{cid: courseId},
		function(){
			$("#alertModal").modal("toggle");
		}
	);
}

$("#courseQuery").click(function() {
	$("#showResultPanel-course").load(
		"courseQuery.php",
		{
			cid: $("#courseCid").val(),
			did: $("#courseDid").val()
		}
	);
});

function deleteCourse()
{
	$.post("deleteCourse.php",
		{
			cid: $("#courseCid").val()
		},
		function(){
			$("#showResultPanel-course").text("");
		}
	);
}

function deleteTeacher()
{
	$.post("deleteTeacher.php",
		{
			tid: $("#teaTid").val()
		},
		function(){
			$("#showResultPanel-tea").text("");
		}
	);
}

function deleteStudetnt()
{
	$.post("deleteStudent.php",
		{
			sid: $("#stuSid").val()
		},
		function(){
			$("#showResultPanel-stu").text("");
		}
	);
}

