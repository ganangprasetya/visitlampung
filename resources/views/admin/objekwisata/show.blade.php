@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Objek Wisata
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
      </ol>
    </section>
    <div id="objekwisata">
        <table class="table table-striped">
            <tr>
              <th>Nama Objek Wisata</th>
              <td>{{ $objekwisata->nama_objekwisata }}</td>
            </tr>
            <tr>
              <th>Jenis Objek Wisata</th>
              <td>{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}</td>
            </tr>
            <tr>
              <th>Lokasi</th>
              <td>{{ $objekwisata->lokasi->desa_kelurahan }}</td>
            </tr>
            <tr>
              <th>Latitude</th>
              <td id="lat">{{ $objekwisata->lat }}</td>
            </tr>
            <tr>
              <th>Longitude</th>
              <td id="lng">{{ $objekwisata->lng }}</td>
            </tr>
            <tr>
              <th>Gambar 1</th>
              <td>&nbsp;
                    @if(isset($objekwisata) && $objekwisata->gambar_satu)
                        <p>
                            {!! Html::image(asset('img/'.$objekwisata->gambar_satu),null,['class'=>'img-responsive','width'=>'400px']) !!}
                        </p>
                    @endif
              </td>
            </tr>
            <tr>
              <th>Gambar 2</th>
              <td>&nbsp;
                    @if(isset($objekwisata) && $objekwisata->gambar_dua)
                        <p>
                            {!! Html::image(asset('img/'.$objekwisata->gambar_dua),null,['class'=>'img-responsive','width'=>'400px']) !!}
                        </p>
                    @endif
              </td>
            </tr>
            <tr>
              <th>Gambar 3</th>
              <td>&nbsp;
                    @if(isset($objekwisata) && $objekwisata->gambar_tiga)
                        <p>
                            {!! Html::image(asset('img/'.$objekwisata->gambar_tiga),null,['class'=>'img-responsive','width'=>'400px']) !!}
                        </p>
                    @endif
              </td>
            </tr>
        </table>
        <div class="box-body"  id="map1"></div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB__8j8_BDA5kVfKJ8Pf-lb64NtkXj7GS0&libraries=places" type="text/javascript"></script>
    <script>
          // alert('{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}');
          var gicn;
          if('{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}' == 'Alam') {
            // alert('alam');
            gicn = '{{ asset('/img/assets/tree.png') }}';
            // alert(gicn);
          } else if('{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}' == 'Keluarga') {
            // alert('keluarga');
            gicn = '{{ asset('img/assets/family.png') }}';
          } else if('{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}' == 'Belanja') {
            // alert('keluarga');
            gicn = '{{ asset('/img/assets/bag.png') }}';
          } else if('{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}' == 'Religi') {
            // alert('keluarga');
            gicn = '{{ asset('/img/assets/praying.png') }}';
          } else if('{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}' == 'Kuliner') {
            // alert('keluarga');
            gicn = '{{ asset('/img/assets/food.png') }}';
          } else if('{{ $objekwisata->jenisobjekwisata->jenis_objekwisata }}' == 'Sejarah') {
            // alert('keluarga');
            gicn = '{{ asset('/img/assets/history.png') }}';
          } else {
            gicn = '{{ asset('/img/assets/hotel.png') }}';
          } 
          var myLatLng = new google.maps.LatLng({{ $objekwisata->lat }}, {{ $objekwisata->lng }});
          // alert(myLatLng);
          var map = new google.maps.Map(document.getElementById('map1'),{
              center:myLatLng,
              zoom:8
            });
            var marker = new google.maps.Marker({
              position: myLatLng,
              icon:gicn,
              title: '{{ $objekwisata->nama_objekwisata }}',
              map: map
            });
    </script>

@endsection