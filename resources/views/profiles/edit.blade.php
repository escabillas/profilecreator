<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  	<form action="{{ route('profile.update', compact('user')) }}" method="post" id="editProfileForm" enctype="multipart/form-data">
	  		@method('PUT')

			<div class="px-5 edit-skill-status text-danger d-flex justify-content-center fw-bold"></div>

			<div class="row mb-4 px-5">            
				<input type="text" name="name" placeholder="Name" class="edit-profile-name form-control"/>
				<div class="edit-profile-name-error text-danger"></div>
			</div>

			<div class="row mb-4 px-5">            
				<textarea name="description" placeholder="Desciption" class="edit-profile-description form-control"></textarea>
				<div class="edit-profile-description-error text-danger"></div>
			</div>   
			<div class="row mb-4 px-5">     
				<label for="imageUpload" class="form-label">Profile picture</label>
				<input type="file" name="image" id="imageUpload" placeholder="Profile picture" class="edit-profile-image form-control"/>
				<div class="edit-profile-image-error text-danger"></div>
			</div>

			<div class="d-flex justify-content-center">
				<button type="submit" class="update-profile btn btn-primary">Save</button>
			</div>
	   	</form>
      </div>
    </div>
  </div>
</div>      

<script type="text/javascript" src="{{ asset('js/profiles/editprofile.js') }}"></script>