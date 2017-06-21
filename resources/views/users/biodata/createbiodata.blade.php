@extends('layouts.user.users')
@section('navbar')
    @include('layouts.user.navbar')
@endsection
@section('content')
    <div class="row tengah grey lighten-4">
        <div class="col s12 m8 offset-m2">
            <div class="card-panel grey lighten-3 z-depth-2">
            <h2 style="margin-top:-15px;" class="grey-text">FORM BIODATA</h2>
            	<div class="form-horizontal">
            	{!! Form::open(['route'=>'biodata.store', 'files' => true,'id'=>'kirim']) !!}
            		{!! Form::hidden('user_id', Auth::user()->id) !!}

            		@if ($errors->any())
	                  <div class="input-field {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="input-field">
	    			@endif
			        	{!! Form::label('nama', 'Nama', ['class' => 'validate']) !!}
          				{!! Form::text('nama', null, ['class' => 'validate']) !!}
          			@if ($errors->has('nama'))
                    <span class="help-block">{{ $errors->first('nama') }}</span>
               		@endif
			        </div>

			        @if ($errors->any())
	                  <div class="input-field {{ $errors->has('tempat_lahir') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="input-field">
	    			@endif
			        	{!! Form::label('tempat_lahir', 'Tempat Lahir', ['class' => 'validate']) !!}
          				{!! Form::text('tempat_lahir', null, ['class' => 'validate']) !!}
          			@if ($errors->has('tempat_lahir'))
                    <span class="help-block">{{ $errors->first('tempat_lahir') }}</span>
               		@endif
			        </div>

			        @if ($errors->any())
	                  <div class="input-field {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="input-field">
	    			@endif
			          {!! Form::date('tanggal_lahir', null, ['class' => 'datepicker']) !!}
			        @if ($errors->has('tanggal_lahir'))
                    <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
               		@endif
			        </div>
					
			        @if ($errors->any())
	                  <div class="input-field {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="input-field">
	    			@endif
						{{-- {!! Form::radio('jenis_kelamin', 'L') !!} --}}
			        	<input name="jenis_kelamin" type="radio" value="L" id="L" {{-- {{ FALSE ? "checked" : "" }} --}}>
					      <label for="L">Laki-laki</label>
					     <input name="jenis_kelamin" type="radio" value="P" id="P" {{-- {{ TRUE ? "checked" : "" }} --}}>
					      <label for="P">Perempuan</label>
					</div>
					@if ($errors->has('jenis_kelamin'))
                    <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
               		@endif
			        

			        <br>

			        @if ($errors->any())
	                  <div class="input-field {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="input-field">
	    			@endif
			        	{!! Form::label('alamat', 'Alamat', ['class' => 'validate']) !!}
          				{!! Form::text('alamat', null, ['class' => 'validate']) !!}
          			@if ($errors->has('alamat'))
                    <span class="help-block">{{ $errors->first('alamat') }}</span>
               		@endif
			        </div>

			        @if ($errors->any())
	                  <div class="input-field {{ $errors->has('no_hp') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="input-field">
	    			@endif
			          <i class="material-icons prefix">phone</i>
			          	{!! Form::label('no_hp', 'Nomor Telepon', ['class' => 'validate']) !!}
          				{!! Form::text('no_hp', null, ['class' => 'validate']) !!}
          			@if ($errors->has('no_hp'))
                    <span class="help-block">{{ $errors->first('no_hp') }}</span>
               		@endif
			        </div>

			        @if ($errors->any())
	                  <div class="file-field input-field {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="file-field input-field">
	    			@endif
				      <div class="btn">
				        <span>File</span>
				        {!! Form::file('foto') !!}
					@if ($errors->has('foto'))
                    <span class="help-block">{{ $errors->first('foto') }}</span>
               		@endif

				      </div>
				      <div class="file-path-wrapper">
				      	<i class="material-icons prefix">perm_media</i>
				        <input class="file-path validate" type="text">
				      </div>
				    </div>

			          {{-- {!! Form::hidden('lat') !!}
			          {!! Form::hidden('lng') !!} --}}
			          {!! Form::text('lat','',['id'=>'lat']) !!}
			          {!! Form::text('lng','',['id'=>'lng']) !!}

			        <div class="form-group">
                    <div class="row">
                         {!! Form::submit('Simpan', ['class' => 'btn btn-large', 'style'=>'width:100%;']) !!}
                    </div>
                	</div>
			    {!! Form::close() !!}
			    </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
	<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJJqFsY-whvD7t71FiFtq_nT-xC5OUteY&libraries=places"></script>
	<script type="text/javascript">
		var map, myLatLng, latval, lngval;
		$(document).ready(function(){
			$('#lat, #lng').hide();
			$('#kirim').submit(function() {
				// console.log('test');
				$('#lat').val(latval);
				$('#lng').val(lngval);
			});
			console.log($('#lng').val());
			console.log($('#lat').val());
		geoLocationInit();
		function geoLocationInit(){
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(success,fail);
			}else{
				alert("Browser not supported");
			}
		}
		function success(position){
			latval = position.coords.latitude;
			lngval = position.coords.longitude;
			myLatLng = new google.maps.LatLng(latval, lngval);
			// alert(myLatLng);
			// nearbySearch(myLatLng, "school");
			// searchWisatas(latval,lngval);
		}

		function fail(){
			alert("it fails");
		}
	});
	</script>
{{-- 	<script>
		$('.fixed-action-btn').openFAB();
		$('.fixed-action-btn').closeFAB();
		$('.fixed-action-btn.toolbar').openToolbar();
		$('.fixed-action-btn.toolbar').closeToolbar();
	</script> --}}
	
@endsection