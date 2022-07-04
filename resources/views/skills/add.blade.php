<div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Add skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row mb-4 px-5">
            <input type="text" placeholder="Title" class="add-skill-title form-control">
            <div class="add-skill-title-error text-danger"></div>
          </div>

          <div class="d-flex justify-content-center">
            <button type="button" class="addSkill btn btn-primary">Save</button>
          </div>

      </div>
    </div>
  </div>
</div>      

<script type="text/javascript" src="{{ asset('js/skills/addskill.js') }}"></script>