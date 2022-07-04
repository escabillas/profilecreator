@extends('layouts.app')

@section('contents')
<div class="container-fluid p-4">
	<div class="card w-75 mx-auto px-5 py-4 border-1">
		<div class="fs-5 pb-2">Search for: <b>{{ $_GET['query'] }}</b></div>
		<ul class="list-group list-group-flush">
			@forelse($results as $result)
				<li class="list-group-item d-flex align-items-center p-3">
					<a href="{{ route('contact', ['user' => $result->username]) }}">
						<div class="profile-image-search-wrapper d-flex flex-wrap align-items-center me-3">
							<img class="w-100 rounded-circle profile-image-search border border-3" src="{{ asset(($result->profile->image)? 'storage/'.$result->profile->image : 'storage/profile/default.png' ) }}">
						</div>					
					</a>
					<div class="name-search-wrapper">
						<a href="{{ route('contact', ['user' => $result->username]) }}">
							<div class="fw-bold fs-6">{{ $result->name }}</div>
						</a>
						<div class="fs-6">{{ $result->email }}</div>					
					</div>
				</li>
			@empty
				<li class="list-group-item d-flex align-items-center p-3">
					<div class="fs-6">No results found.</div>
				</li>
			@endforelse
		</ul>
	</div>
</div>

@endsection