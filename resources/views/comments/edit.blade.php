<div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Edit Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="px-5 edit-comment-status text-danger d-flex justify-content-center fw-bold"></div>
          
          <input type="hidden" class="edit-comment-id form-control">

          <div class="row mb-4 px-5">            
            <textarea placeholder="Write comment(s) for this profile..." class="edit-comment form-control"></textarea>
            <div class="edit-comment-error text-danger"></div>
          </div>   

          <div class="d-flex justify-content-center">
            <button type="button" class="update-comment btn btn-primary">Save</button>
          </div>

      </div>
    </div>
  </div>
</div>      

<script type="text/javascript" src="{{ asset('js/comments/editcomment.js') }}"></script>