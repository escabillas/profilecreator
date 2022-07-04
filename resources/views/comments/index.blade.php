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
		  	@cannot('update', $user)
			  	<div class="d-flex mx-5 mb-5 mt-3 justify-content-center">
				  	<div class="w-50 me-3">
			            <textarea placeholder="Write comment(s) for this profile..." class="add-comment form-control"></textarea>
			            <div class="add-comment-error text-danger"></div>
		        	</div>

	        		<div class="d-inline">
						<div class="d-flex h-100 align-items-center">
						  	<button type="button" class="addComment btn btn-primary">Submit</button>
					  	</div>
					</div>
				</div>
			@endcannot

			<div id="viewComments" class="mt-3"></div>

			<script type="text/javascript" src="{{ asset('js/comments/viewcomment.js') }}"></script>

			<script type="text/javascript" src="{{ asset('js/comments/addcomment.js') }}"></script>

			@include('comments.edit')

			<script type="text/javascript" src="{{ asset('js/comments/deletecomment.js') }}"></script>

		  </div>
		</div>
			
		</div>
	</div>
@endsection