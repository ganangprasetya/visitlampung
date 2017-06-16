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
        <li class="active"><a href="{{ route('kecamatan.index') }}"><i></i> Kecamatan</a></li>
      </ol>
    </section>
		<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Kecamatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form"> --}}
          	{!! Form::open(['route'=>'kecamatan.store']) !!}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Kabupaten</label>
                  {!! Form::select('id_kabupatenkota', App\Kabupaten::pluck('nama_kabupatenkota','id')->all(), null, ['class'=>'form-control','id'=>'id_kabupatenkota','placeholder'=>'Pilih Kabupaten']) !!}
                </div>
              </div>
              <div class="box-body">
        				<div class="form-group">
        					{!! Form::label('nama_kecamatan', 'Nama Kecamatan:', ['class' => 'control-label']) !!}
        					{!! Form::text('nama_kecamatan', null, ['class' => 'form-control']) !!}
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