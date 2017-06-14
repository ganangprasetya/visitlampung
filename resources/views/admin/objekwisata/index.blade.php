@extends('layouts.admin')
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
                  <td>1</td>
                  <td>Pantai Mutun</td>
                  <td>Alam</td>
                  <td>Hanura</td>
                  <td>-5.5143121</td>
                  <td>105.2632458</td>
                  <td>Pantai Mutun adalah pantai dari lautan pantai</td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat">Action</button>
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Delete</a></li>

                      <li><a href="#">Update</a></li>

                      <li><a href="#">Detail</a></li>

                      </ul>
                    </div>
                  </td>
                </tbody>
              </table>
              <div class="bottom-nav">
                  <div>
                    <a href="objekwisata/create" class="btn btn-primary">Tambah Data</a>
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
            <a href="{{ url('#') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Kabupaten</h3>
            <a href="{{ url('#') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Kecamatan</h3>
            <a href="{{ url('#') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Jenis Objek Wisata</h3>
            <a href="{{ url('#') }}" class="btn btn-primary" role="button">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>

@endsection