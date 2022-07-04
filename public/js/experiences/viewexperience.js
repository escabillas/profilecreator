$(document).ready(function () {

    window.viewExperiences = function() {

    	$('#viewExperiences').html("");

    	$.ajax({
    		type: "GET",
    		url: getRoute("experience.view"),
    		dataType: "json",
    		success: function(response) {
                if(response.count > 0)
                {
                    $.each(response.experiences, function(key, items) {
                        $('#viewExperiences').append(templateExperience(items));
                    });
                    breakList(".experience-wrapper");
                }			
                else
                {
                    $('#viewExperiences').append(templateNone("No experience to show..."));
                }
    		}
    	});
    }

    viewExperiences();
});