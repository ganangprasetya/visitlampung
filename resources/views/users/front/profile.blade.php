@extends('layouts.user.users')

@section('navbar')
	@include('layouts.user.navbar')
@endsection

@section('sidebar')
	@include('layouts.user.sidebar')
@endsection

@section('searchbar')
	@include('layouts.user.searchbar')
@endsection

@section('content')
	<div class="row">
		<div class="col s12 z-depth-2 teal lighten-2">
				<h1>Profile</h1>
		</div>
		<div class="col s12 grey lighten-1">
			<div class="col s6 grey lighten-2">aaaa</div>
			<div class="col s6 grey lighten-2">aaaa</div>
		</div>
	</div>
@endsection

@section('footer')
	@include('layouts/user/footer')
@endsection