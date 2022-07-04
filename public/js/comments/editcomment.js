$(document).ready(function () {
  
  $(document).on('click', '#editComment', function (e) {
    e.preventDefault();

    $('#editCommentModal').modal('show');
    $('#editCommentModal').find('.form-control').val("");

    var id = $(this).val();
    var url = getRoute("comment.edit");
    url = url.replace(':id', id);

    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: function(response) {
        if(response.status == 404)
        {
          $('.edit-comment-status').text(response.message).addClass("mb-4");
        } 
        else 
        {
          $('.edit-comment-status').html("").removeClass("mb-4");
          $('.edit-comment-id').val(response.comment.id);
          $('.edit-comment').val(response.comment.comment);
        }
      }
    });
    
  });

  $(document).on('click', '.update-comment', function (e) {
    e.preventDefault();

    var data = {
      'comment': $('.edit-comment').val(),
    }

    var id = $('.edit-comment-id').val();
    var url = getRoute("comment.update");
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
        if(response.status == 404 || response.status == 403)
        {
          alert(response.message);
        }
        else if(response.status == 400) 
        {
          $.each(response.errors, function (key, error) {
            $('.edit-comment-status').removeClass('pb-3').html("").removeClass("mb-4");
            $('.edit-'+ key).addClass('border-danger');
            $('.edit-'+ key +'-error').text(error);
          });
        }
        else 
        {
          $('.edit-comment-status').removeClass('pb-3').html("").removeClass("mb-4");
          $('#editCommentModal').find('.form-control').removeClass('border-danger').val("");
          $('#editCommentModal').find('.text-danger').html("");
          $('#editCommentModal').modal('hide');
          $('#comment-'+response.comment.id).text(response.comment.comment);
          $('.updated-comment-'+response.comment.id).text("Edited");

        }
      }
    });
  });
});