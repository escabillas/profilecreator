@extends('layouts.app')

@section('contents')
<div class="card w-50 mx-auto p-5 border-1 mt-5">
	@if (session('status'))
		<div class="d-flex justify-content-center mb-4">
			<div class="text-bg-danger w-50 py-3 d-flex justify-content-center rounded">
				{{ session('status') }}
			</div>		
		</div>
	@endif

	<form action="{{ route('login') }}" method="post">
		@csrf
		<div class="row mb-4 px-5">
				<input type="email" name="email" placeholder="Email" class="form-control @error('email') border-danger @enderror" value="{{ old('email') }}" id="inputEmail">
				@error('email')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-4 px-5">
				<input type="password" name="password" placeholder="Password" class="form-control @error('password') border-danger @enderror" id="inputPassword">
				@error('password')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mt-4 justify-content-center">
			<button type="submit" class="btn btn-primary w-25">Login</button>
		</div>
	</form>
</div>
@endsection