$(document).ready(function () {

	$('#viewComments').html("");

	$.ajax({
		type: "GET",
		url: getRoute("comment.view"),
		dataType: "json",
		success: function(response) {
            if(response.count > 0)
            {
                $.each(response.comments, function(key, items) {
                    $('#viewComments').append(templateComment(items, response.authId));
                });
                breakList(".comment-wrapper");
            }			
            else
            {
                $('#viewComments').append(templateNone("No comment to show..."));
            }
		}
	});
});