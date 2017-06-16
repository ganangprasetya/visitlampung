@extends('layouts.admin.admin')
@section('content')
    <section class="content-header">
      <h1>
        Jenis Objek Wisata
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active"><a href="{{ route('jenisobjekwisata.index') }}"><i></i> Jenis Objek Wisata</a></li>
      </ol>
    </section>
		<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Jenis Objek Wisata</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form"> --}}
          	{!! Form::open(['route'=>'jenisobjekwisata.store']) !!}
              <div class="box-body">
              @if ($errors->any())
                  <div class="form-group {{ $errors->has('jenis_objekwisata') ? 'has-error' : 'has-success' }}">
                @else
                  <div class="form-group">
                @endif
                  {!! Form::label('jenis_objekwisata', 'Jenis Objek Wisata:', ['class' => 'control-label']) !!}
                  {!! Form::text('jenis_objekwisata', null, ['class' => 'form-control']) !!}
                @if ($errors->has('jenis_objekwisata'))
                      <span class="help-block">{{ $errors->first('jenis_objekwisata') }}</span>
                @endif
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="form-group">
        					{!! Form::submit('Tambah', ['class' => 'btn btn-primary form-control']) !!}
        				</div>
              </div>
            {{-- </form> --}}
            {!! Form::close() !!}
          </div>
        </div>
@endsection