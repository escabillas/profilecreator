$(document).ready(function () {
  
  $(document).on('click', '.addProject', function (e) {
    e.preventDefault();

    var data = {
      'title': $('.add-project-title').val(),
      'description': $('.add-project-description').val(),
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type: "POST",
      url: getRoute('project'),
      data: data,
      dataType: "json",
      success: function (response) {
        if(response.status == 400)
        {
          $('#addProjectModal').find('.form-control').removeClass('border-danger');
          $('#addProjectModal').find('.text-danger').html("");

          $.each(response.errors, function (key, error) {
            $('.add-project-'+ key).addClass('border-danger');
            $('.add-project-'+ key +'-error').text(error);
          });
        }
        else
        {
          $('#addProjectModal').find('.form-control').removeClass('border-danger').val("");
          $('#addProjectModal').find('.text-danger').html("");
          $('#addProjectModal').modal('hide');          
          $('.menu-content-none').remove();
          $('#viewProjects').prepend(templateProject(response.project));
          breakList(".project-wrapper");
        }
      }
    });
  });
});