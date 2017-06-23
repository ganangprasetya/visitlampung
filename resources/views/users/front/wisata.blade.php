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
		<div class="col s12 z-depth-2 teal lighten-2" style="margin-bottom:20px;">
			<h2>{{ $jenisobjekwisata->jenis_objekwisata }}</h2>
		</div>
		<br>

		@foreach ($detail_objekwisata as $wisata)
			<div class="col s12 m6 grey lighten-5 z-depth-2 hoverable" style="margin-bottom:10px;">
		      	<div class="col s3">
		            <img src="{{ asset('img/'.$wisata->gambar_satu) }}" width="300" heihgt="300" class="responsive-img" alt="{{ $wisata->gambar_satu }}"> 
		            {{-- {!! Html::image(asset('img/'.$wisata->gambar_satu),null,['class'=>'circle responsive-img','width'=>'200px']) !!} --}}
		        </div>
		        <div class="col s5">
		        	<p class="siji">{{ $wisata->nama_objekwisata }}</p>
		        </div>
		        <div class="col s4">
		        	<center><a href="{{ route('kategori.wisata.show', $wisata->id) }}" class="waves-effect waves-light btn-large">GO HERE</a></center>
		        </div>
	      	</div>
		@endforeach

      	
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