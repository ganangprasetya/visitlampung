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
        <li class="active">Jenis Objek Wisata</li>
      </ol>
    </section>
		<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Jenis Objek Wisata</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form"> --}}
          	{!! Form::model($jenisobjekwisata, ['method' => 'PATCH', 'action' => ['JenisobjekwisataController@update', $jenisobjekwisata->id]]) !!}
              <div class="box-body">
                <div class="form-group">
                  {!! Form::label('jenis_objekwisata', 'Jenis Objek Wisata:', ['class' => 'control-label']) !!}
                  {!! Form::text('jenis_objekwisata', null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="form-group">
        					{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        				</div>
              </div>
            {{-- </form> --}}
            {!! Form::close() !!}
          </div>
        </div>
@endsection