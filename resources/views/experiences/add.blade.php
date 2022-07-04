<div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Add Experience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('experience', compact('user')) }}" method="post" id="addExperienceForm" enctype="multipart/form-data">

          <div class="row mb-4 px-5">
            <input type="text" name="position" placeholder="Position" class="add-experience-position form-control">
            <div class="add-experience-position-error text-danger"></div>
          </div>

          <div class="row mb-4 px-5">
            <input type="text" name="company" placeholder="Company" class="add-experience-company form-control">
            <div class="add-experience-company-error text-danger"></div>
          </div>

          <div class="row mb-4 px-5">
            <label for="start-date-form" class="px-0">Start date:</label>
            <div id="start-date-form" class="row g-2 pe-0 my-0">
              <div class="col-md px-0 my-0">
                <div class="form-floating px-0">
                  <select class="form-select me-2 add-experience-startdatemonth" name="startdatemonth" id="floatingSelectMonth">
                    <option selected></option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                  <label for="floatingSelectMonth">Month</label>
                </div>
              </div>
              <div class="col-md px-0 my-0">
                <div class="form-floating px-0">
                  <select class="form-select floating-year add-experience-startdateyear" name="startdateyear" id="floatingSelectYear">
                    <option selected></option>
                  </select>
                  <label for="floatingSelectYear">Year</label>
                </div>
              </div>
              <div class="add-experience-startdatemonth-error text-danger"></div>
              <div class="add-experience-startdateyear-error text-danger"></div>
            </div>
          </div>

          <div class="row mb-4 px-5">
            <div class="d-flex px-0">
              <input type="checkbox" name="current" id="current" class="add-experience-current form-check-input me-2">
              <label for="current">I'm currently working on this position</label>
            </div>
            <div class="add-experience-current-error text-danger"></div>
          </div>

          <div class="row mb-4 px-5">
            <label for="end-date-form" class="px-0">End date:</label>
            <div id="end-date-form" class="row g-2 px-0 my-0">
              <div class="col-md px-0 my-0">
                <div class="form-floating px-0">
                  <select class="form-select me-2 add-experience-enddatemonth" name="enddatemonth" id="floatingSelectMonth">
                    <option selected ></option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                  <label for="floatingSelectMonth" value="">Month</label>
                </div>
              </div>
              <div class="col-md px-0 my-0">
                <div class="form-floating px-0">
                  <select class="form-select floating-year add-experience-enddateyear" name="enddateyear" id="floatingSelectYear">
                    <option selected></option>
                  </select>
                  <label for="floatingSelectYear">Year</label>
                </div>
              </div>
              <div class="add-experience-enddatemonth-error text-danger"></div>
              <div class="add-experience-enddateyear-error text-danger"></div>
              <div class="add-experience-enddate-error text-danger"></div>
            </div>
          </div>

          <div class="row mb-4 px-5">
            <textarea placeholder="Description" name="description" class="add-experience-description form-control"></textarea>
            <div class="add-experience-description-error text-danger"></div>
          </div>          

          <div class="d-flex justify-content-center">
            <button type="submit" class="addExperience btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>      

<script type="text/javascript" src="{{ asset('js/experiences/addexperience.js') }}"></script>