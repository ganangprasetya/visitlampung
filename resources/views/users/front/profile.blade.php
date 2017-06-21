@extends('layouts.user.users')

@section('sidebar')
	@include('layouts.user.sidebar')
@endsection
@section('navbar')
	@include('layouts.user.navbar')
@endsection

@section('content')
	<div class="row">
		<div class="col s12 z-depth-2 teal lighten-2">
				<h1>Profile</h1>
		</div>
		<div class="col card-panel s12 m10 offset-m1 grey lighten-5">
			<div class="col s3">
				<img class="materialboxed circle responsive-img hoverable" width="300" src="{{ asset('img/'.Auth::user()->biodata->foto) }}">
			</div>
			<div class="col s6">
				<p>Nama : {{ Auth::user()->biodata->nama }}</p>
				<p>Tempat Lahir : {{ Auth::user()->biodata->tempat_lahir }}</p>
				<p>Tanggal Lahir : {{ Auth::user()->biodata->tanggal_lahir->formatLocalized('%d %B %Y') }}</p>
				<p>Jenis Kelamin : {{ Auth::user()->biodata->jenis_kelamin }}</p>
				<p>Alamat : {{ Auth::user()->biodata->alamat }}</p>
				<p>Kontak : {{ Auth::user()->biodata->no_hp }}</p>
			</div>
			<div class="col s3">
				<a href="{{ route('biodata.edit',Auth::user()->biodata->id) }}" class="waves-effect waves-light btn-floating btn-large red z-depth-4"><i class="material-icons">mode_edit</i></a>
			</div>
		</div>
	</div>
 	 <div class="fixed-action-btn vertical">
	    <a class="btn-floating btn-large teal accent-4 z-depth-4">
	      <i class="large material-icons">tab</i>
	    </a>
	    <ul>
	      <li><a href="{{url('/searchbymap')}}" class="btn-floating green"><i class="material-icons">my_location</i></a></li>
	      <li><a href="{{url('/')}}" class="btn-floating blue "><i class="material-icons">search</i></a></li>
	    </ul>
 	</div>

@endsection	
@section('script')
	<script>
		$('.fixed-action-btn').openFAB();
		$('.fixed-action-btn').closeFAB();
		$('.fixed-action-btn.toolbar').openToolbar();
		$('.fixed-action-btn.toolbar').closeToolbar();
	</script>
@endsection
