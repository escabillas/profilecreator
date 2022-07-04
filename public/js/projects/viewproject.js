$(document).ready(function () {

	$('#viewProjects').html("");

	$.ajax({
		type: "GET",
		url: getRoute("project.view"),
		dataType: "json",
		success: function(response) {
            if(response.count > 0)
            {
                $.each(response.projects, function(key, items) {
                    $('#viewProjects').append(templateProject(items));
                });
                breakList(".project-wrapper");
            }			
            else
            {
                $('#viewProjects').append(templateNone("No project to show..."));
            }
		}
	});
});