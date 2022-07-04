@extends('layouts.app')

@section('contents')
	<div class="container-fluid p-4">
		
		@include('profiles.index')

		<div class="card w-75 mx-auto mt-4 border-1">
		  <div class="card-header text-center">
		    <ul class="nav nav-tabs card-header-tabs">
				@include('layouts.menu')
		    </ul>
		  </div>
		  <div class="card-body">
		  	@can('update', $user)
			  	<div class="d-flex justify-content-center my-3">
			  		<button type="button" class="add-experience-btn btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addExperienceModal">
			  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
				  			<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
						</svg>
			  		</button>
				</div>
			@endcan

			<div id="viewExperiences" class="mt-3"></div>

			<script type="text/javascript" src="{{ asset('js/experiences/viewexperience.js') }}"></script>

			@include('experiences.add')

			@include('experiences.edit')

			<script type="text/javascript" src="{{ asset('js/experiences/deleteexperience.js') }}"></script>
		  </div>
		</div>
			
		</div>
	</div>
@endsection