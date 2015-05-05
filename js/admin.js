$("#stuQuery").click(function() {
	$("#showResultPanel").load(
		"stuQuery.php",
		{
			sid: $("#stuSid").val(),
			did: $("#stuDid").val()
		}
	);
});


function addStuCourse() {
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
}

function dropStuCourse() {
	$.post("../student/dropCourse.php",
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
}

