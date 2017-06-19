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
			<h2>ALAM</h2>
		</div>
		<br>
      	<div class="col s12 m6 grey lighten-5 z-depth-2" style="margin-bottom:10px;">
	      	<div class="col s3">
	            <img src="img/assets/mutun.png" width="200" class="circle responsive-img"> 
	        </div>
	        <div class="col s5">
	        	<p class="siji">PANTAI MUTUN</p>
	        </div>
	        <div class="col s4">
	        	<center><a href="#" class="waves-effect waves-light btn-large">GO HERE</a></center>
	        </div>
      	</div>	
      	<div class="col s12 m6 grey lighten-5 z-depth-2" style="margin-bottom:10px;">
	      	<div class="col s3">
	            <img src="img/assets/mutun.png" width="200" class="circle responsive-img"> 
	        </div>
	        <div class="col s5">
	        	<p class="siji">PANTAI MUTUN</p>
	        </div>
	        <div class="col s4">
	        	<center><a href="#" class="waves-effect waves-light btn-large">GO HERE</a></center>
	        </div>
      	</div>
      	<div class="col s12 m6 grey lighten-5 z-depth-2" style="margin-bottom:10px;">
	      	<div class="col s3">
	            <img src="img/assets/mutun.png" width="200" class="circle responsive-img"> 
	        </div>
	        <div class="col s5">
	        	<p class="siji">PANTAI MUTUN</p>
	        </div>
	        <div class="col s4">
	        	<center><a href="#" class="waves-effect waves-light btn-large">GO HERE</a></center>
	        </div>
      	</div>
    </div>
    {{-- <div class="fixed-action-btn vertical">
	    <a class="btn-floating btn-large teal accent-4 z-depth-4">
	      <i class="large material-icons">mode_edit</i>
	    </a>
	    <ul>
	      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
	      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
	      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
	      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
	    </ul>
 	</div> --}}

@endsection	
{{-- @section('script')
	<script>
		$('.fixed-action-btn').openFAB();
		$('.fixed-action-btn').closeFAB();
		$('.fixed-action-btn.toolbar').openToolbar();
		$('.fixed-action-btn.toolbar').closeToolbar();
	</script>
@endsection --}}