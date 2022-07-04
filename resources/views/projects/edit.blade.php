<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Edit Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="px-5 edit-project-status text-danger d-flex justify-content-center fw-bold"></div>
          
          <input type="hidden" class="edit-project-id form-control">

          <div class="row mb-4 px-5">            
            <input type="text" placeholder="Title" class="edit-project-title form-control">
            <div class="edit-project-title-error text-danger"></div>
          </div>

          <div class="row mb-4 px-5">
            <textarea placeholder="Description" class="edit-project-description form-control"></textarea>
            <div class="edit-project-description-error text-danger"></div>
          </div>      

          <div class="d-flex justify-content-center">
            <button type="button" class="update-project btn btn-primary">Save</button>
          </div>

      </div>
    </div>
  </div>
</div>      

<script type="text/javascript" src="{{ asset('js/projects/editproject.js') }}"></script>