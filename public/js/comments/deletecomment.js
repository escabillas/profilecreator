$(document).ready(function () {

	$(document).on('click', '#deleteComment', function (e) {

		var id = $(this).val();
	    var url = getRoute("comment.delete");
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
				if(response.status == 404 || response.status == 403)
        		{
        			alert(response.message);
        		}
        		else
        		{
        			$('#comment-'+id).closest("div.comment-wrapper").remove();
					breakList(".comment-wrapper");

					if(response.count == 0)
					{
						$('#viewComments').append(templateNone("No comment to show..."));
					}
        		}
			}
		});

	});	
});