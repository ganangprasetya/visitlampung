@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Objek Wisata
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active">Kecamatan</li>
      </ol>
    </section>
    <div class="row">
      <div  id="kecamatan">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kecamatan</h3>
            </div>
            <div class="box-body">
              <table id="kecamatan" class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Nama Kabupaten</th>
                  <th>Nama Kecamatan</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($kecamatan as $objek)
                    <tr>
                      <td>{{ $objek->id }}</td>
                      <td>{{ $objek->kabupaten->nama_kabupatenkota}}</td>
                      <td>{{ $objek->nama_kecamatan}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          {{-- <li><a href="#">Delete</a></li> --}}
                          <li>
                              {!! Form::open(['method' => 'DELETE', 'action' => ['KecamatanController@destroy', $objek->id]]) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!}
                              {!! Form::close() !!}
                          </li>

                          <li><a href="{{ route('kecamatan.edit',$objek->id) }}">Update</a></li>

                          <li><a href="#">Detail</a></li>

                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="bottom-nav">
                  <div>
                    <a href="{{ route('kecamatan.create') }}" class="btn btn-primary">Tambah Data</a>
                  </div>
              </div> 
            </div>
          </div> 
        </div>
      </div> 
    </div>

@endsection