$(document).ready(function () {
  
  $('.edit-experience-current').on('change', function() {
    if( $(this).is(":checked") )
    {
      console.log('checked');
      $('#end-date-form-edit').find('.form-select').val('').prop('disabled', true);
    }
    else
    {
      $('#end-date-form-edit').find('.form-select').prop('disabled', false);
    }
  });

  $(document).on('click', '#editExperience', function (e) {
    e.preventDefault();

    $('#editExperienceModal').modal('show');
    $('#editExperienceModal').find('.form-control').val("");
    $('#editExperienceModal').find('.form-select').val("");

    var id = $(this).val();
    var url = getRoute("experience.edit");
    url = url.replace(':id', id);

    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: function(response) {
        if(response.status == 404)
        {
          $('.edit-experience-status').text(response.message).addClass("mb-4");
        } 
        else 
        {
          $('.edit-experience-status').html("").removeClass("mb-4");
          $('.edit-experience-id').val(response.experience.id);
          $('.edit-experience-position').val(response.experience.position);
          $('.edit-experience-startdatemonth').val(response.experience.startdatemonth);
          $('.edit-experience-startdateyear').val(response.experience.startdateyear);
          $('.edit-experience-current').prop('checked', response.experience.current).change();
          $('.edit-experience-enddatemonth').val(response.experience.enddatemonth);
          $('.edit-experience-enddateyear').val(response.experience.enddateyear);
          $('.edit-experience-company').val(response.experience.company);
          $('.edit-experience-description').val(response.experience.description);
        }
      }
    });
    
  });

  $(document).on('submit', '#editExperienceForm', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type: 'POST',
      url: $(this).attr('action'),
      data: new FormData(this),
      processData: false,
      contentType: false,
      success: function (response) {
        if(response.status == 404)
        {
          $('.edit-experience-status').text(response.message).addClass("mb-4");
        } 
        else if(response.status == 400) 
        {
          $('.edit-experience-status').removeClass('pb-3').html("").removeClass("mb-4");
          $('#editExperienceModal').find('.form-control').removeClass('border-danger');
          $('#editExperienceModal').find('.form-select').removeClass('border-danger');
          $('#editExperienceModal').find('.text-danger').html("");

          $.each(response.errors, function (key, error) {
            error = String(error).replace('startdate','').replace('enddate','');
            $('.edit-experience-'+key).addClass('border-danger');
            $('.edit-experience-'+key+'-error').text(error);
          });

          if(response.startend)
            {
              $('.edit-experience-enddate-error').text(response.startend.error);
            }
        }
        else 
        {
          $('.edit-experience-status').removeClass('pb-3').html("").removeClass("mb-4");
          $('#editExperienceModal').find('.form-control').removeClass('border-danger').val("");
          $('#editExperienceModal').find('.form-select').removeClass('border-danger').val("");
          $('#editExperienceModal').find('.text-danger').html("");
          $('#editExperienceModal').modal('hide');

          viewExperiences();
        }
      }
    });
  });
});