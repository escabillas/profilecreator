<div class="modal fade" id="editSkillModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Edit skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="px-5 edit-skill-status text-danger d-flex justify-content-center fw-bold"></div>

          <input type="hidden" class="edit-skill-id form-control">

          <div class="row mb-4 px-5">
            <input type="text" placeholder="Title" class="edit-skill-title form-control">
            <div class="edit-skill-title-error text-danger"></div>
          </div>

          <div class="d-flex justify-content-center">
            <button type="button" class="update-skill btn btn-primary">Save</button>
          </div>

      </div>
    </div>
  </div>
</div>      

<script type="text/javascript" src="{{ asset('js/skills/editskill.js') }}"></script>