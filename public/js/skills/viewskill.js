$(document).ready(function () {

	$('#viewSkills').html("");

	$.ajax({
		type: "GET",
		url: getRoute("skill.view"),
		dataType: "json",
		success: function(response) {
            if(response.count > 0)
            {
                $.each(response.skills, function(key, items) {
                    $('#viewSkills').append(templateSkill(items));
                });
                breakList(".skill-wrapper");
            }			
            else
            {
                $('#viewSkills').append(templateNone("No skill to show..."));
            }
		}
	});
});