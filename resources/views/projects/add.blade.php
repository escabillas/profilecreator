<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Add project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row mb-4 px-5">
            <input type="text" placeholder="Title" class="add-project-title form-control">
            <div class="add-project-title-error text-danger"></div>
          </div>

          <div class="row mb-4 px-5">
            <textarea placeholder="Description" class="add-project-description form-control"></textarea>
            <div class="add-project-description-error text-danger"></div>
          </div>          

          <div class="d-flex justify-content-center">
            <button type="button" class="addProject btn btn-primary">Save</button>
          </div>

      </div>
    </div>
  </div>
</div>      

<script type="text/javascript" src="{{ asset('js/projects/addproject.js') }}"></script>