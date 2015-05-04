$(document).ready(function() {
	
	$("#stuQuery").click(function() {
		$("#showResultPanel").load(
			"stuQuery.php",
			{
				sid: $("#stuSid").val(),
				did: $("#stuDid").val()
			}
		);
	});

	$("#addStuCourse").click(function() {
		alert("test");
		$.post("../student/addCourse.php",
			{
				sid: $("#stuSid").val(),
				courseId: $("#courseId").val()
			},
			function(data, status)
			{
				alert(data);
			}
		);

		$("#showResultPanel").load(
			"stuQuery.php",
			{
				sid: $("#stuSid").val(),
				did: ""
			}
		);
	});

	$("#dropStuCourse").click(function() {
	});
});

