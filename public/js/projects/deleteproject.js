$(document).ready(function () {

	$(document).on('click', '#deleteProject', function (e) {

		var id = $(this).val();
	    var url = getRoute("project.delete");
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
				$('#project-title-'+id).closest("div.project-wrapper").remove();
				breakList(".project-wrapper");

				if(response.count == 0)
				{
					$('#viewProjects').append(templateNone("No project to show..."));
				}
			}
		});

	});	
});