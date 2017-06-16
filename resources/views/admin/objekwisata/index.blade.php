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
        <li class="active">Objek Wisata</li>
      </ol>
    </section>
    <div class="row">
      <div  id="objekwisata">
        <div class="col-sm-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Objek Wisata</h3>
            </div>
            <div class="box-body">
              <table id="objekwisata" class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Nama Objek Wisata</th>
                  <th>Jenis Wisata</th>
                  <th>Lokasi</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Info</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($objekwisata as $objek)
                    <tr>
                      <td>{{ $objek->id }}</td>
                      <td>{{ $objek->nama_objekwisata }}</td>
                      <td>{{ $objek->jenisobjekwisata->jenis_objekwisata }}</td>
                      <td>{{ $objek->lokasi->desa_kelurahan }}</td>
                      <td>{{ $objek->lat }}</td>
                      <td>{{ $objek->long }}</td>
                      <td>{{ $objek->info }}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          <li>
                              {!! Form::open(['method' => 'DELETE', 'action' => ['ObjekwisataController@destroy', $objek->id]]) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!}
                              {!! Form::close() !!}
                          </li>

                          <li><a href="{{ route('objekwisata.edit',$objek->id) }}">Update</a></li>

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
                    <a href="{{ route('objekwisata.create') }}" class="btn btn-primary">Tambah Data</a>
                  </div>
              </div> 
            </div>
          </div> 
        </div>
      </div> 
      <div class="col-sm-2">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Lokasi</h3>
            <a href="{{ route('lokasi.index') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Kabupaten</h3>
            <a href="{{ route('kabupaten.index') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Kecamatan</h3>
            <a href="{{ route('kecamatan.index') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Jenis Objek Wisata</h3>
            <a href="{{ route('jenisobjekwisata.index') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>

@endsection