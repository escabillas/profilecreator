$(document).ready(function () {
  
  $(document).on('click', '.addSkill', function (e) {
    e.preventDefault();

    var data = {
      'title': $('.add-skill-title').val(),
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type: "POST",
      url: getRoute('skill'),
      data: data,
      dataType: "json",
      success: function (response) {
        if(response.status == 400)
        {
          $.each(response.errors, function (key, error) {
            $('.add-skill-title').addClass('border-danger');
            $('.add-skill-'+key+'-error').text(error);
          });
        }
        else
        {
          $('#addSkillModal').find('.form-control').removeClass('border-danger').val("");
          $('#addSkillModal').modal('hide');
          $('.menu-content-none').remove();
          $('#viewSkills').prepend(templateSkill(response.skill));
          breakList(".skill-wrapper");
        }
      }
    });
  });
});