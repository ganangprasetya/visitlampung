@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lokasi
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active">Lokasi</li>
      </ol>
    </section>
    <div class="row">
      <div  id="lokasi">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Lokasi</h3>
            </div>
            <div class="box-body">
            @include('admin._partial.flash_message')
              <table id="lokasi" class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Lokasi</th>
                  <th>Nama Kabupaten</th>
                  <th>Nama Kecamatan</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($lokasi as $objek)
                    <tr>
                      <td>{{ $objek->id }}</td>
                      <td><strong>{{ $objek->desa_kelurahan}}</strong></td>
                      <td>{{ $objek->kecamatan->kabupaten->nama_kabupatenkota}}</td>
                      <td>{{ $objek->kecamatan->nama_kecamatan}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ route('lokasi.edit',$objek->id) }}">Update</a></li>
                          
                          <li>
                              {!! Form::open(['method' => 'DELETE', 'action' => ['LokasiController@destroy', $objek->id]]) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!}
                              {!! Form::close() !!}
                          </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="bottom-nav">
                  <div>
                    <a href="{{ route('lokasi.create') }}" class="btn btn-primary">Tambah Data</a>
                  </div>
              </div> 
            </div>
          </div> 
        </div>
      </div> 
    </div>

@endsection