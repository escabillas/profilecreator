$(document).ready(function () {
  
  $(document).on('click', '#editSkill', function (e) {
    e.preventDefault();

    $('#editSkillModal').modal('show');
    $('#editSkillModal').find('.form-control').val("");

    var id = $(this).val();
    var url = getRoute("skill.edit");
    url = url.replace(':id', id);

    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: function(response) {
        if(response.status == 404)
        {
          $('.edit-skill-status').text(response.message).addClass("mb-4");
        } 
        else 
        {
          $('.edit-skill-status').html("").removeClass("mb-4");
          $('.edit-skill-id').val(response.skill.id);
          $('.edit-skill-title').val(response.skill.title);
        }
      }
    });
    
  });

  $(document).on('click', '.update-skill', function (e) {
    e.preventDefault();

    var data = {
      'title': $('.edit-skill-title').val(),
    }

    var id = $('.edit-skill-id').val();
    var url = getRoute("skill.update");
    url = url.replace(':id', id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type: "PUT",
      url: url,
      data: data,
      dataType: "json",
      success: function (response) {
        if(response.status == 404)
        {
          $('.edit-skill-status').text(response.message).addClass("mb-4");
        } 
        else if(response.status == 400) 
        {
          $.each(response.errors, function (key, error) {
            $('.edit-skill-status').html("").removeClass("mb-4");
            $('.edit-skill-'+key).addClass('border-danger');
            $('.edit-skill-'+key+'-error').text(error);
          });
        }
        else 
        {
          $('.edit-skill-status').html("").removeClass("mb-4");
          $('#editSkillModal').find('.form-control').removeClass('border-danger').val("");
          $('#editSkillModal').find('.text-danger').html("");
          $('#editSkillModal').modal('hide');
          $('#skill-title-'+response.skill.id).text(response.skill.title);
        }
      }
    });
  });
});