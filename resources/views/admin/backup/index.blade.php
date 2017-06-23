@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Backup
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Backup</li>
      </ol>
    </section>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <center><h3 class="box-title">BACKUP DATA</h3></center>
          </div>
          <div class="box-body">
              {!! Form::open(['url'=>'admin/backup','method'=>'post','class'=>'form-horizontal']) !!}
              {!! Form::submit('Download Backup data Objekwisata', ['class'=>'btn btn-primary', 'style'=>'height:60px;width:100%;']) !!}
              {!! Form::close() !!}
          </div>
        </div>
            
      </div>
    </div>
@endsection