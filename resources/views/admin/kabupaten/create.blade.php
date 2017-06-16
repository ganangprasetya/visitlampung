@extends('layouts.admin.admin')
@section('content')
  <section class="content-header">
      <h1>
        Objek Wisata
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active"><a href="{{ route('kabupaten.index') }}"><i></i> Kabupaten</a></li>
      </ol>
    </section>
		<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Kabupaten</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form"> --}}
          	{!! Form::open(['route'=>'kabupaten.store', 'files' => true]) !!}
              <div class="box-body">
        				<div class="form-group">
        					{!! Form::label('nama_kabupatenkota', 'Nama Kabupaten:', ['class' => 'control-label']) !!}
        					{!! Form::text('nama_kabupatenkota', null, ['class' => 'form-control']) !!}
        				</div>
                <div class="form-group">
                  {!! Form::label('pusat_pemerintahan', 'Pusat Pemerintahan:', ['class' => 'control-label']) !!}
                  {!! Form::text('pusat_pemerintahan', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('peta_lokasi', 'Peta Lokasi') !!}
                  {!! Form::file('peta_lokasi', ['class'=>'form-control']) !!}
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