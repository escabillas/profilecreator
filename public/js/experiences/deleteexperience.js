$(document).ready(function () {

	$(document).on('click', '#deleteExperience', function (e) {

		var id = $(this).val();
	    var url = getRoute("experience.delete");
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
				viewExperiences();
			}
		});

	});	
});