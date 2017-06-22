@extends('layouts.user.users')

@section('navbar')
	@include('layouts.user.navbar')
@endsection

@section('sidebar')
	@include('layouts.user.sidebar')
@endsection

@section('content')
	<div class="row grey lighten-4">
		<div class="col s12 m8 offset-m2">
			<div class="card-panel grey lighten-3 z-depth-2">
				<h1>Ubah Password</h1>
				{!! Form::open(['url'=>url('/setting/password'),'method'=>'post']) !!}
					<div class="input-field {{ $errors->has('password') ? 'has-error' : '' }}">
					{!! Form::label('password', 'Password lama') !!}
					{!! Form::password('password', ['class'=>'validate']) !!}
					{!! $errors->first('password','<p class="help-block">:message</p>') !!}
				</div>
				<div class="input-field {{ $errors->has('new_password') ? 'has-error' : '' }}">
					{!! Form::label('new_password', 'Password baru', ['class'=>'validate']) !!}
					{!! Form::password('new_password', ['class'=>'form-control']) !!}
					{!! $errors->first('new_password','<p class="help-block">:message</p>') !!}
				</div>
				<div class="input-field {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
					{!! Form::label('new_password_confirmation', 'Konfirmasi password baru', ['class'=>'validate']) !!}
					{!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
					{!! $errors->first('new_password_confirmation','<p class="help-block">:message</p>') !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Simpan', ['class' => 'btn btn-large', 'style'=>'width:100%;', 'id'=>'reset']) !!}
				</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

@section('footer')
	@include('layouts.user.footer')
@endsection
@section('script')
	<script type="text/javascript">
		$('#reset').on('click', function() {
			alert('Password berhasil diupdate');
		});
	</script>
@endsection