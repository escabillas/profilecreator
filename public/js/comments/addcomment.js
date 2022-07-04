$(document).ready(function () {
  
  $(document).on('click', '.addComment', function (e) {
    e.preventDefault();

    var data = {
      'comment': $('.add-comment').val(),
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type: "POST",
      url: getRoute('comment'),
      data: data,
      dataType: "json",
      success: function (response) {
        if(response.status == 400)
        {
          $('.add-comment').removeClass('border-danger').val("");
          $('.add-comment-error').html("");       

          $.each(response.errors, function (key, error) {
            $('.add-'+ key).addClass('border-danger');
            $('.add-'+ key +'-error').text(error);
          });
        }
        else if(response.status == 401)
        {
          window.location.href = getRoute('login');
        }
        else if(response.status == 403)
        {
          alert(response.message);
        }
        else
        {
          $('.add-comment').removeClass('border-danger').val("");
          $('.add-comment-error').html("");       
          $('.menu-content-none').remove();
          $('#viewComments').prepend(templateComment(response.comment, response.authId));
          breakList(".comment-wrapper");
        }        
      }
    });
  });
});