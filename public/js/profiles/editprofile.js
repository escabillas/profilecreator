$(document).ready(function() {
	$(document).on('click', '.profile-edit-btn', function(e) {
		e.preventDefault();

	    $('#editProfileModal').modal('show');
	    $('#editProfileModal').find('.form-control').val("");

	    $.ajax({
	      type: "GET",
	      url: getRoute("profile.edit"),
	      dataType: "json",
	      success: function(response) {
	        if(response.status == 404)
	        {
	          $('.edit-profile-status').text(response.message).addClass("mb-4");
	        } 
	        else 
	        {
	          $('.edit-profile-status').html("").removeClass("mb-4");
	          $('.edit-profile-name').val(response.user.name);
	          $('.edit-profile-description').val(response.profile.description);
	        }
	        
	      }
	    });
	});

	$(document).on('submit', '#editProfileForm', function (e) {
	    e.preventDefault();

	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.ajax({
	      type: "POST",
	      url: $(this).attr("action"),
	      data: new FormData(this),
	      processData: false,
	      contentType: false,
	      success: function (response) {
	        if(response.status == 404)
	        {
	          $('.edit-profile-status').text(response.message).addClass("mb-4");
	        } 
	        else if(response.status == 400) 
	        {
	          $.each(response.errors, function (key, error) {
	            $('.edit-profile-status').html("").removeClass("mb-4");
	            $('.edit-profile-'+key).addClass('border-danger');
	            $('.edit-profile-'+key+'-error').text(error);
	          });
	        }
	        else 
	        {
	          $('.edit-profile-status').html("").removeClass("mb-4");
	          $('#editProfileModal').find('.form-control').removeClass('border-danger').val("");
	          $('#editProfileModal').find('.text-danger').html("");
	          $('#editProfileModal').modal('hide');
	          $('.profile-image').attr('src', getAsset('storage/'+response.profile.image));
	          $('.profile-name').text(response.user.name);
	          if( response.profile.description != null )
	          {
	          	$('.profile-description').text(response.profile.description);
	          }
	          else
	          {
	          	$('.profile-description').text('Profile description...');
	          }
	        }
	      }
	    });
	});
});