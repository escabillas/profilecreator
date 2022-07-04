@extends('layouts.app')

@section('contents')
<div class="card w-50 mx-auto p-5 border-1 mt-5">
	<h4 class="mb-4">Edit Contact</h4>
	<form action="{{ route('contact.update', compact('user')) }}" method="post">
		@csrf
		@method('PUT')

		<div class="row mb-4 px-5">
				<input type="text" name="address" placeholder="Address" class="form-control @error('address') border-danger @enderror" value="{{ old('address') ?? $user->profile->contact->address }}" id="inputAdress">
				@error('address')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-4 px-5">
				<input type="text" name="social" placeholder="Social" class="form-control @error('social') border-danger @enderror" value="{{ old('social') ?? $user->profile->contact->social }}" id="inputSocial">
				@error('social')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-4 px-5">
				<input type="text" name="website" placeholder="Website" class="form-control @error('website') border-danger @enderror" value="{{ old('website') ?? $user->profile->contact->website }}" id="inputWebsite">
				@error('website')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-3 px-5">
				<input type="email" name="email" placeholder="Email" class="form-control @error('email') border-danger @enderror" value="{{ old('email') ?? $user->profile->user->email }}" id="inputEmail">
				@error('email')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mb-3 px-5">
				<input type="number" name="mobile" placeholder="Mobile" class="form-control @error('mobile') border-danger @enderror" value="{{ old('mobile') ?? $user->profile->contact->mobile }}" id="inputMobile">
				@error('mobile')
					<div class="text-danger">
						{{ $message }}	
					</div>
				@enderror
		</div>
		<div class="row mt-4 justify-content-center">
			<button type="submit" class="btn btn-primary w-25">Save</button>
		</div>
	</form>
</div>
@endsection