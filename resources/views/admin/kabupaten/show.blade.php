@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Kabupaten
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active"><a href="{{ route('kabupaten.index') }}"><i></i> Kabupaten</a></li>
      </ol>
    </section>
      <div id="kabupaten">
        <table class="table table-striped">
            <tr>
              <th>Nama Kabupaten</th>
              <td>{{ $kabupaten->nama_kabupatenkota }}</td>
            </tr>
            <tr>
              <th>Pusat Pemerintahan</th>
              <td>{{ $kabupaten->pusat_pemerintahan }}</td>
            </tr>
            <tr>
              <th>Peta Lokasi</th>
              <td>
              &nbsp;
                    @if(isset($kabupaten) && $kabupaten->peta_lokasi)
                        <p>
                            {!! Html::image(asset('img/'.$kabupaten->peta_lokasi),null,['class'=>'img-rounded img-responsive','width'=>'400px']) !!}
                        </p>
                    @endif
              </td>
            </tr>
        </table>
      </div>
@endsection
