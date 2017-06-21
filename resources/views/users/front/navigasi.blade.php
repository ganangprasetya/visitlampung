@extends('layouts.user.users')

@section('navbar')
	@include('layouts.user.navbar')
@endsection

@section('sidebar')
	@include('layouts.user.sidebar')
@endsection

@section('content')
	<div class="row">
		<div class="col s12 grey lighten-4">
			<div id="map"></div>
			<div id="kiri"></div>
			{!! Form::open(['route'=>'navigasi.store','method'=>'post']) !!}
				{!! Form::hidden('id_objekwisata', $navigasi->id) !!}
				{!! Form::submit('SELESAI', ['class' => 'waves-effect waves-light btn-large', 'id'=>'transaksi','style'=>'width:100%;']) !!}
			{!! Form::close() !!}
			{{-- <a id="transaksi" style="width:100%; margin-top: -30px;" class="waves-effect waves-light btn-large" href="{{ route('navigasi.store') }}">SELESAI</a> --}}
		</div>
	</div>
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJJqFsY-whvD7t71FiFtq_nT-xC5OUteY"></script>
	<script>
	$(document).ready(function(){
		$('#transaksi').on('click', function() {
			alert('Terima kasih');
		});

		geoLocationInit();
		function geoLocationInit(){
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(success,fail);
			}else{
				alert("Browser not supported");
			}
		}

		function success(position){
			var latval = position.coords.latitude;
			var lngval = position.coords.longitude;

			// console.log([latval,lngval]);
			var myLatLng = new google.maps.LatLng(latval, lngval);
			// nearbySearch(myLatLng, "school");
			// searchWisatas(latval,lngval);
			// var chicago = {lat: 41.85, lng: -87.65};
			var desLatLng = new google.maps.LatLng({{ $navigasi->lat }}, {{ $navigasi->lng }});
	        var map = new google.maps.Map(document.getElementById('map'), {
	          center: myLatLng,
	          zoom: 7
	        });
        	var directionsDisplay = new google.maps.DirectionsRenderer({
	          map: map
	        });
	        directionsDisplay.setPanel(document.getElementById('kiri'));
	        console.log(kiri);
        	var request = {
	          destination: desLatLng,
	          origin: myLatLng,
	          travelMode: 'DRIVING'
	        };
	        // Pass the directions request to the directions service.
	        var directionsService = new google.maps.DirectionsService();
	        directionsService.route(request, function(response, status) {
	          if (status == 'OK') {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
          	}
        	});

		}
		function fail(){
			alert("it fails");
		}
     });
    </script>

@endsection