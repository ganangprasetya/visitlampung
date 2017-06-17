@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kabupaten
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active">Kabupaten</li>
      </ol>
    </section>
    <div class="row">
      <div  id="kabupaten">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kabupaten</h3>
            </div>

            <div class="box-body">
            @include('admin._partial.flash_message')
              <table id="kabupaten" class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Nama Kabupaten</th>
                  <th>Pusat Pemerintahan</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($kabupaten as $objek)
                    <tr>
                      <td>{{ $objek->id }}</td>
                      <td>{{ $objek->nama_kabupatenkota}}</td>
                      <td>{{ $objek->pusat_pemerintahan }}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          @role('admin')
                          <li><a href="{{ route('kabupaten.edit',$objek->id) }}">Update</a></li>
                          @endrole
                          <li><a href="{{ route('kabupaten.show', $objek->id) }}">Detail</a></li>
                          @role('admin')
                          <li>
                              {!! Form::open(['method' => 'DELETE', 'action' => ['KabupatenController@destroy', $objek->id]]) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!}
                              {!! Form::close() !!}
                          </li>
                          @endrole
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="bottom-nav">
                  <div>
                    @role('admin')
                    <a href="{{ route('kabupaten.create') }}" class="btn btn-primary">Tambah Data</a>
                    @endrole
                  </div>
              </div> 
            </div>
          </div> 
        </div>
      </div> 
    </div>

@endsection