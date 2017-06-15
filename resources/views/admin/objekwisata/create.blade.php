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
      </ol>
    </section>
		<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Objek Wisata</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form"> --}}
          	{!! Form::open(['route'=>'objekwisata.store']) !!}
              <div class="box-body">
                <div class="form-group">
                  {!! Form::label('nama_objekwisata', 'Nama Objek Wisata:', ['class' => 'control-label']) !!}
                  {!! Form::text('nama_objekwisata', null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>Jenis Wisata</label>
                  {!! Form::select('id_jenis', App\Jenisobjekwisata::pluck('jenis_objekwisata','id')->all(), null, ['class'=>'form-control','id'=>'id_jenis','placeholder'=>'Pilih Jenis Wisata']) !!}
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>Lokasi</label>
                  {!! Form::select('id_lokasi', App\Lokasi::pluck('desa_kelurahan','id')->all(), null, ['class'=>'form-control','id'=>'id_lokasi','placeholder'=>'Pilih Lokasi']) !!}
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <input type="text" id="searchmap">
                  <div id="map-canvas"></div>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  {!! Form::label('lat', 'Lat', ['class' => 'control-label']) !!}
                  {!! Form::text('lat', null, ['class' => 'form-control']) !!}
                </div>
              </div>  
              <div class="box-body">
                <div class="form-group">
                  {!! Form::label('long', 'Lng', ['class' => 'control-label']) !!}
                  {!! Form::text('long', null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  {!! Form::label('info', 'Info', ['class' => 'control-label']) !!}
                  {!! Form::text('info', null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="form-group">
        					{!! Form::submit('Tambah', ['class' => 'btn btn-primary form-control']) !!}
        				</div>
              </div>
            {{-- </form> --}}
            {!! Form::close() !!}
          </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB__8j8_BDA5kVfKJ8Pf-lb64NtkXj7GS0&libraries=places" type="text/javascript"></script>
        <script type="text/javascript">
          var map = new google.maps.Map(document.getElementById('map-canvas'),{
              center:{
                lat: -4.90842412818591,
                lng: 104.9586635078125
              },
              zoom:8
            });
            var marker = new google.maps.Marker({
              position: {
                lat: -4.90842412818591,
                lng: 104.9586635078125
              },
              map: map,
              draggable: true
            });
            var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

            google.maps.event.addListener(searchBox, 'places_changed', function(){
              var places = searchBox.getPlaces();
              var bounds = new google.maps.LatLngBounds();
              var i, place;

              for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
              }
              map.fitBounds(bounds);
              map.setZoom(12);

            });

            google.maps.event.addListener(marker, 'position_changed', function(){
              var lat = marker.getPosition().lat();
              var long = marker.getPosition().lng();

              $('#lat').val(lat);
              $('#long').val(long);
          });
        </script>
@endsection