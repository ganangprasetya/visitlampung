@extends('layouts.user.users')

@section('navbar')
	@include('layouts.user.navbar')
@endsection

@section('sidebar')
	@include('layouts.user.sidebar')
@endsection

@section('content')
	<div class="row">
			<div class="col s12 grey lighten-4" id="map"></div>
			{{-- <div style="margin-top:10px;" class="col s12">
				<select class="browser-default" id="radius">
				    <option value="0" disabled selected>Radius</option>
				    <option value="1000">1 KM</option>
				    <option value="2000">2 KM</option>
				    <option value="3000">3 KM</option>
				    <option value="4000">4 KM</option>
				    <option value="5000">5 KM</option>
				    <option value="6000">6 KM</option>
				    <option value="7000">7 KM</option>
				    <option value="8000">8 KM</option>
				    <option value="9000">9 KM</option>
				    <option value="10000">10 KM</option>
			  	</select>
			</div> --}}
	</div>
	<div class="fixed-action-btn vertical">
	    <a class="btn-floating btn-large teal accent-4 z-depth-4">
	      <i class="large material-icons">tab</i>
	    </a>
	    <ul>
	      <li><a href="{{url('/searchbymap')}}" class="btn-floating green pulse"><i class="material-icons">my_location</i></a></li>
	      <li><a href="{{url('/')}}" class="btn-floating blue "><i class="material-icons">search</i></a></li>
	    </ul>
 	</div>
@endsection

@section('script')
	<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJJqFsY-whvD7t71FiFtq_nT-xC5OUteY&libraries=places"></script>
	<script type="text/javascript">
		
		var map, myLatLng;
		
		// var radius;
		$(document).ready(function(){
		// $('#radius').on('change', function(e){
		//   // console.log(e);

		//   radius = e.target.value;

		//   // alert(radius);
		//   geoLocationInit();
		// });
		// setInterval(geoLocationInit,1000);
		// myVar = setTimeout(geoLocationInit, 1000);
		// clearTimeout(myVar);
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

			console.log([latval,lngval]);
			myLatLng = new google.maps.LatLng(latval, lngval);
			createMap(myLatLng);
			// nearbySearch(myLatLng, "school");
			searchWisatas(latval,lngval);

		}

		function fail(){
			alert("it fails");
		}

		function createMap(myLatLng){
			map = new google.maps.Map(document.getElementById('map'), {
		      center: myLatLng,
		      zoom: 12
		    });	

		    var marker = new google.maps.Marker({
		    	position: myLatLng,
			    map: map
		    });
		}

		function createMarker(latlng, icn, name, idmap){
			var marker = new google.maps.Marker({
			    position: latlng,
			    map: map,
			    icon: icn,
			    title: name,
			    url: "kategori/wisata/"+idmap
				});
			google.maps.event.addListener(marker, 'click', function() {
        	window.location.href = this.url;
    	});
		}
		
		//Pencarian wisata terdekat
		function searchWisatas(lat,lng){
		$.post('{{ url('/api/searchWisatas') }}', {lat:lat, lng:lng}, function(match){
			$.each(match, function(i, val){
				//looping data wisata terdekat
				var glatval=val.lat;
				var glngval=val.lng;
				var gname =val.nama_objekwisata;
				var gid = val.id;
				var GLatLng = new google.maps.LatLng(glatval, glngval);
				var gicn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
				createMarker(GLatLng,gicn,gname,gid);
				// console.log(gid);
			});

		});
	}

		// function nearbySearch(myLatLng, type){
		// 	var request = {
		//     location: myLatLng,
		//     radius: radius,
		//     types: [type]
		//   	};

		// 	service = new google.maps.places.PlacesService(map);
		// 	service.nearbySearch(request, callback);

		// 	function callback(results, status) {
		// 		console.log(results);
		// 		  if (status == google.maps.places.PlacesServiceStatus.OK) {
		// 		     for (var i = 0; i < results.length; i++) {
		// 		       var place = results[i];
		// 		       latlng = place.geometry.location;
		// 		       icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
		// 		       name = place.name;
		// 		       createMarker(latlng, icn, name);
		// 		     }
		//   		}
		// 	}
		// }
	});
	</script>
	<script>
		$('.fixed-action-btn').openFAB();
		$('.fixed-action-btn').closeFAB();
		$('.fixed-action-btn.toolbar').openToolbar();
		$('.fixed-action-btn.toolbar').closeToolbar();
	</script>
	
@endsection