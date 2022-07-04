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
		  <div class="card-body content-form-wrapper">
		  	@can('update', $user)
			  	<div class="d-flex justify-content-end my-3 me-5 btn-form-wrapper">
			  		<a href="{{ route('contact.edit', compact('user')) }}">
			  			<button type="button" class="btn btn-outline-secondary btn-cust-gray edit-btn hidden-html">
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
								<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
							</svg>
						</button>
			  		</a>
				</div>
			@endcan
			<div class="d-flex my-3 mx-5 justify-content-start">
			  	<h5 class="w-15 me-3 my-auto align-middle">Address:</h5>
			  	<h5 class="my-auto align-middle fw-normal">{{ $user->profile->contact->address }}</h5>
		  	</div>
		  	<hr>
		  	<div class="d-flex my-3 mx-5 justify-content-start">
			  	<h5 class="w-15 me-3 my-auto align-middle">Social:</h5>
			  	<a class="fs-5 text-decoration-none my-auto align-middle" target="_blank" href="{{ $user->profile->contact->social }}">{{ $user->profile->contact->social }}</a>
		  	</div>
		  	<hr>
		  	<div class="d-flex my-3 mx-5 justify-content-start">
			  	<h5 class="w-15 me-3 my-auto align-middle">Website:</h5>
			  	<a class="fs-5 text-decoration-none my-auto align-middle" target="_blank" href="{{ $user->profile->contact->website }}">{{ $user->profile->contact->website }}</a>
		  	</div>
		  	<hr>
		  	<div class="d-flex my-3 mx-5 justify-content-start">
			  	<h5 class="w-15 me-3 my-auto align-middle">Email:</h5>
			  	<a class="fs-5 text-decoration-none my-auto align-middle" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
		  	</div>
		  	<hr>
		  	<div class="d-flex my-3 mx-5 justify-content-start">
			  	<h5 class="w-15 me-3 my-auto align-middle">Mobile:</h5>
			  	<h5 class="my-auto align-middle fw-normal">{{ $user->profile->contact->mobile }}</h5>
		  	</div>
		  </div>
		</div>
			
		</div>
	</div>
@endsection