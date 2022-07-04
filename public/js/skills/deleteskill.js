$(document).ready(function () {

	$(document).on('click', '#deleteSkill', function (e) {

		var id = $(this).val();
	    var url = getRoute("skill.delete");
	    url = url.replace(':id', id);

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			type: "DELETE",
			url: url,
			dataType: "json",
			success: function(response) {
				$('#skill-title-'+id).closest("div.skill-wrapper").remove();
				breakList(".skill-wrapper");

				if(response.count == 0)
				{
					$('#viewSkills').append(templateNone("No skill to show..."));
				}
			}
		});

	});	
});