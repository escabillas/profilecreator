$(document).ready(function () {
  
  $(document).on('click', '#editProject', function (e) {
    e.preventDefault();

    $('#editProjectModal').modal('show');
    $('#editProjectModal').find('.form-control').val("");

    var id = $(this).val();
    var url = getRoute("project.edit");
    url = url.replace(':id', id);

    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: function(response) {
        if(response.status == 404)
        {
          $('.edit-project-status').text(response.message).addClass("mb-4");
        } 
        else 
        {
          $('.edit-project-status').html("").removeClass("mb-4");
          $('.edit-project-id').val(response.project.id);
          $('.edit-project-title').val(response.project.title);
          $('.edit-project-description').val(response.project.description);
        }
      }
    });
    
  });

  $(document).on('click', '.update-project', function (e) {
    e.preventDefault();

    var data = {
      'title': $('.edit-project-title').val(),
      'description': $('.edit-project-description').val(),
    }

    var id = $('.edit-project-id').val();
    var url = getRoute("project.update");
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
          $('.edit-project-status').text(response.message).addClass("mb-4");
        } 
        else if(response.status == 400) 
        {
          $.each(response.errors, function (key, error) {
            $('.edit-project-status').removeClass('pb-3').html("").removeClass("mb-4");
            $('.edit-project-'+key).addClass('border-danger');
            $('.edit-project-'+key+'-error').text(error);
          });
        }
        else 
        {
          $('.edit-project-status').removeClass('pb-3').html("").removeClass("mb-4");
          $('#editProjectModal').find('.form-control').removeClass('border-danger').val("");
          $('#editProjectModal').find('.text-danger').html("");
          $('#editProjectModal').modal('hide');
          $('#project-title-'+response.project.id).text(response.project.title);
          $('#project-description-'+response.project.id).text(response.project.description);
        }
      }
    });
  });
});