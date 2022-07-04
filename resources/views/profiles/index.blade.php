@include('layouts.scriptfunction')

<div class="card w-75 mx-auto p-4 border-1">
	<div class="d-flex profile-wrapper content-form-wrapper justify-content-between">
		<div class="profile-image-wrapper d-flex flex-wrap align-items-center">
			<img class="w-100 profile-image rounded-circle border border-3" src="{{ asset(($user->profile->image)? 'storage/'.$user->profile->image : 'storage/profile/default.png' ) }}"/>
		</div>

		<div class="w-100 ms-4 me-3 justify-content-left">
			<div class="d-flex h-25">
				<div class="profile-name fw-bold fs-4 flex-wrap align-items-center">{{ $user->name }}</div>
			</div>			
			<div class="h-75">
				<div class="d-flex h-100">
					<div class="profile-description h-100 overflow-auto fs-6">{{ $user->profile->description ?? "Profile description..." }}</div>
				</div>
			</div>
		</div>
		@can('update', $user)
		<div class="w-5 profile-btn-wrapper d-flex flex-wrap justify-content-end align-items-baseline">
			<button type="button" class="btn btn-outline-secondary btn-cust-gray profile-edit-btn edit-btn hidden-html">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
					<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
  				</svg>
			</button>
		</div>
		@endcan
	</div>
</div>

@include('profiles.edit')