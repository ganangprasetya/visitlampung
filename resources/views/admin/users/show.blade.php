@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Users
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li><a href="{{ url('/admin/data/users') }}"><i></i> Users</a></li>
      </ol>
    </section>
    <div id="users">
        <table class="table table-striped">
            <tr>
              <th>Foto</th>
              <td>&nbsp;
                    @if(isset($users) && $users->gambar_satu)
                        <p>
                            {!! Html::image(asset('img/'.$users->foto),null,['class'=>'img-responsive circle','width'=>'300px']) !!}
                        </p>
                    @endif
              </td>
            </tr>
            <tr>
              <th>Nama</th>
              <td>{{ $users->name }}</td>
            </tr>
            <tr>
              <th>Tempat Lahir</th>
              <td>{{ $users->biodata->tempat_lahir }}</td>
            </tr>
            <tr>
              <th>Tanggal Lahir</th>
              <td>{{ $users->biodata->tanggal_lahir }}</td>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <td>{{ $users->biodata->jenis_kelamin }}</td>
            </tr>
            <tr>
              <th>No HP</th>
              <td>{{ $users->biodata->no_hp }}</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>{{ $users->biodata->alamat }}</td>
            </tr>
            <tr>
              <th>Lokasi terakhir :</th>
              
            </tr>
        </table>
        <div class="box-body"  id="map1"></div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB__8j8_BDA5kVfKJ8Pf-lb64NtkXj7GS0&libraries=places" type="text/javascript"></script>
    <script>
          var myLatLng = new google.maps.LatLng({{ $users->biodata->lat }}, {{ $users->biodata->lng }});
          // alert(myLatLng);
          var map = new google.maps.Map(document.getElementById('map1'),{
              center:myLatLng,
              zoom:15
            });
            var marker = new google.maps.Marker({
              position: myLatLng,
              icon:'{{ asset('/img/assets/photo.jpg') }}',
              title: '{{ $users->name }}',
              map: map
            });
    </script>

@endsection