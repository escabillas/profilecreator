$(document).ready(function() {
	var d = new Date();

	var currYear = d.getFullYear();
	var yearLimit = 0;

	while(yearLimit <= 100){
		var printYear = currYear-yearLimit

		$('.floating-year').append("<option value="+ printYear +">"+ printYear +"</option>");

		yearLimit++;
	}

	$('.add-experience-current').on('change', function() {
		if( $(this).is(":checked") )
		{
			$('#end-date-form').find('.form-select').val('').prop('disabled', true);
		}
		else
		{
			$('#end-date-form').find('.form-select').prop('disabled', false);
		}
	});

	$(document).on('submit', '#addExperienceForm', function(e) {
		e.preventDefault();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
	      type: "POST",
	      url: $(this).attr('action'),
	      data: new FormData(this),
	      processData: false,
	      contentType: false,
	      success: function (response) {
	        if(response.status == 400) 
	        {
	          $('#addExperienceModal').find('.form-control').removeClass('border-danger');
	          $('#addExperienceModal').find('.form-select').removeClass('border-danger');
	          $('#addExperienceModal').find('.text-danger').html("");

	          $.each(response.errors, function (key, error) {
	          	error = String(error).replace('startdate','').replace('enddate','');
	            $('.add-experience-'+key).addClass('border-danger');
	            $('.add-experience-'+key+'-error').text(error);
	          });

	          if(response.startend)
	          {
	          	$('.add-experience-enddate-error').text(response.startend.error);
	          }

	        }
	        else 
	        {
	          $('#addExperienceModal').find('.form-control').removeClass('border-danger').val("");
	          $('#addExperienceModal').find('.form-select').removeClass('border-danger').val("");
	          $('#addExperienceModal').find('.text-danger').html("");
	          $('#addExperienceModal').modal('hide');

	          viewExperiences();
	        }
	      }
	    });
	});
});