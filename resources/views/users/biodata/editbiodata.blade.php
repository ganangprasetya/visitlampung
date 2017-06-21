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

            	{!! Form::model($biodata, ['method' => 'PATCH', 'action' => ['BiodataController@update', $biodata->id], 'files' => true, 'id'=>'kirim']) !!}
            		@if ($errors->any())
	                  <div class="input-field {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
	                @else
	    			<div class="input-field">
	    			@endif
			        	{!! Form::label('nama', 'Nama', ['class' => 'validate']) !!}
          				{!! Form::text('nama', $biodata->nama, ['class' => 'validate']) !!}
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
			          {!! Form::date('tanggal_lahir', !empty($biodata) ? $biodata->tanggal_lahir->format('Y-m-d') : null, ['class' => 'datepicker']) !!}
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
			        	<input name="jenis_kelamin" type="radio" value="L" id="L" {{ ($biodata->jenis_kelamin == 'L') ? "checked" : "" }}>
					      <label for="L">Laki-laki</label>
					     <input name="jenis_kelamin" type="radio" value="P" id="P" {{ ($biodata->jenis_kelamin == 'P') ? "checked" : "" }}>
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
				    &nbsp;
                    @if(isset($biodata) && $biodata->foto)
                        <p>
                            {!! Html::image(asset('img/'.$biodata->foto),null,['class'=>'img-rounded img-responsive','width'=>'200px']) !!}
                        </p>
                    @endif
			        <div class="form-group">
                    <div class="row">
                         {!! Form::submit('Update', ['class' => 'btn btn-large', 'style'=>'width:100%;']) !!}
                    </div>
                	</div>
			    {!! Form::close() !!}
			    </div>
            </div>
        </div>
    </div>
@endsection