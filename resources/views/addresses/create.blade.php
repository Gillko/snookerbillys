@extends('layouts.layout')
@section('head')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhE6pyj86Gh5ufm7A3EyOCchm-raaJLwg&sensor=false&libraries=places"></script>
	
	<script type="text/javascript">
		function initialize() {
			var address = (document.getElementById('my-address'));
			var autocomplete = new google.maps.places.Autocomplete(address);
			autocomplete.setTypes(['geocode']);
			google.maps.event.addListener(autocomplete, 'place_changed', function() {
				var place = autocomplete.getPlace();
				if (!place.geometry) {
					return;
				}

			var address = '';
			if (place.address_components) {
				address = [
					(place.address_components[0] && place.address_components[0].short_name || ''),
					(place.address_components[1] && place.address_components[1].short_name || ''),
					(place.address_components[2] && place.address_components[2].short_name || '')
					].join(' ');
				}
			});
		}

		function codeAddress() {
			geocoder = new google.maps.Geocoder();
			var address = document.getElementById("my-address").value;
			geocoder.geocode( { 'address': address}, function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) {
			  	document.getElementById("latitude").value = results[0].geometry.location.lat();
			  	document.getElementById("longitude").value = results[0].geometry.location.lng();
			  	//alert("Latitude: "+results[0].geometry.location.lat());
			  	//alert("Longitude: "+results[0].geometry.location.lng());
			  } 
			  else {
				alert("Geocode was not successful for the following reason: " + status);
			  }
		  });
		}
			google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@endsection
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Create an Address</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'addresses')) }}
						{{ Form::label('address_country', 'Country')}}
						{{ Form::text('address_country') }}
						{{ Form::label('address_city', 'City')}}
						{{ Form::text('address_city') }}
						{{ Form::label('address_postalcode', 'Postal Code')}}
						{{ Form::text('address_postalcode') }}
						{{ Form::label('address_street', 'Street')}}
						{{ Form::text('address_street', null, ['id' => 'my-address']) }}
						{{ Form::label('address_number', 'Number')}}
						{{ Form::text('address_number') }}
						{{ Form::label('address_latitude', 'Latitude')}}
						{{ Form::text('address_latitude', null, ['id' => 'latitude']) }}
						{{ Form::label('address_longitude', 'Longitude')}}
						{{ Form::text('address_longitude', null, ['id' => 'longitude']) }}


						{{ Form::submit('Create the Address!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
					<button id="getCords" onClick="codeAddress();">Generate Latitude and Longitude</button>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('bottom-scripts')
	
@endsection


