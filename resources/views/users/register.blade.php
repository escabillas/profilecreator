@extends('layouts.app')

@section('contents')
<div class="card w-50 mx-auto p-5 border-1 mt-5">
	<form action="{{ route('register') }}" method="post">
		@csrf
		<div class="row mb-4 px-5">
				<input type="text" name="name" placeholder="Name" class="form-control @error('name') border-danger @enderror" value="{{ old('name') }}" id="inputName">
				@error('name')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-4 px-5">
				<input type="text" name="username" placeholder="Username" class="form-control @error('username') border-danger @enderror" value="{{ old('username') }}" id="inputUsername">
				@error('username')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-3 px-5">
				<input type="email" name="email" placeholder="Email" class="form-control @error('email') border-danger @enderror" value="{{ old('email') }}" id="inputEmail">
				@error('email')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-3 px-5">
				<input type="password" name="password" placeholder="Password" class="form-control @error('password') border-danger @enderror" id="inputPassword">
				@error('password')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-3 px-5">
				<input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control @error('password_confirmation') border-danger @enderror" id="confirmPassword">
				@error('password_confirmation')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mt-4 justify-content-center">
			<button type="submit" class="btn btn-primary w-25">Register</button>
		</div>
	</form>
</div>
@endsection