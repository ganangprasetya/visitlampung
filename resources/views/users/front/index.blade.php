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
				<h1>Kategori Objek Wisata</h1>
		</div>
		@foreach($kategori as $objek)
      	<div class="col s12 m6">
		    <div class="card-panel grey lighten-5 z-depth-2">
		      	<div class="row valign-wrapper">
			      	<div class="col s6">
			      		{{-- <img class="materialboxed responsive-img" width="400" src="img/assets/alam.jpg"> --}}
			      		&nbsp;
                    	@if(isset($objek) && $objek->foto)
                        	<p>
                            {!! Html::image(asset('img/'.$objek->foto),null,['class'=>'materialboxed responsive-img','width'=>'300px']) !!}
                        	</p>
                    @endif
			      	</div>
			      	<div class="col s6">
			      		<h4 class="black-text" >{{ $objek->jenis_objekwisata}}</h4>
		              	<center><a href="{{url('/wisata')}}" class="waves-effect waves-light btn-large">Lihat Daftar Wisata</a></center>
			      	</div>
		      	</div>
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
	      <li><a href="{{url('/')}}" class="btn-floating blue pulse"><i class="material-icons">search</i></a></li>
	    </ul>
 	</div>
@endsection	
@section('footer')
	@include('layouts/user/footer')
@endsection
@section('script')
	<script>
		$('.fixed-action-btn').openFAB();
		$('.fixed-action-btn').closeFAB();
		$('.fixed-action-btn.toolbar').openToolbar();
		$('.fixed-action-btn.toolbar').closeToolbar();
	</script>
@endsection