@extends('layouts.user.users')

@section('navbar')
	@include('layouts.user.navbar')
@endsection

@section('sidebar')
	@include('layouts.user.sidebar')
@endsection
@section('profile')
<li><a class="waves-effect" href="{{ route('biodata.index') }}"><i class="material-icons">perm_identity</i>Profile</a></li>
@endsection

@section('content')
	<div>
		<div class="col s12 grey lighten-3 z-depth-2">
			<h3 style="margin-bottom:-60px">{{ $objekwisata->nama_objekwisata }}</h3>
		<div class="carousel" >
			@if ($jumlah == 3)
				<a class="carousel-item"><img src="{{ asset('img/'.$objekwisata->gambar_satu) }}" class="responsive-img"></a>
				<a class="carousel-item"><img src="{{ asset('img/'.$objekwisata->gambar_dua) }}" class="responsive-img"></a>
				<a class="carousel-item"><img src="{{ asset('img/'.$objekwisata->gambar_tiga) }}" class="responsive-img"></a>
			@elseif($jumlah == 2)
				<a class="carousel-item"><img src="{{ asset('img/'.$objekwisata->gambar_satu) }}" class="responsive-img"></a>
				<a class="carousel-item"><img src="{{ asset('img/'.$objekwisata->gambar_dua) }}" class=" responsive-img"></a>
			@else
				<a class="carousel-item"><img src="{{ asset('img/'.$objekwisata->gambar_satu) }}" class="responsive-img"></a>
			@endif
				{{-- @for ($i = 1; $i <= $jumlah; $i++)
					<a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1" class="materialboxed responsive-img"></a>
				@endfor --}}
		    {{-- <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1" class="materialboxed responsive-img"></a>
		    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2" class="materialboxed responsive-img"></a>
		    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3" class="materialboxed responsive-img"></a>
		    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4" class="materialboxed responsive-img"></a>
		    <a  class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5" class="materialboxed responsive-img"></a> --}}
		</div>
			<a href="#modal1" style="width:100%; margin-bottom: 10px; margin-top: -100px;" class="waves-effect waves-light btn-large"><i class="material-icons ">library_books</i></a>
			<a href="{{ route('navigasi.show',$objekwisata->id) }}" style="width:100%; margin-top: -30px;" class="waves-effect waves-light btn-large"><i class="material-icons">navigation</i></a>
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
	<div id="modal1" class="modal modal-fixed-footer">
	    <div class="modal-content">
	      <h4>{{ $objekwisata->nama_objekwisata }}</h4>
	      <p>{{ $objekwisata->info }}</p>
	    </div>
    <div class="modal-footer">
    </div>
  </div>
@endsection