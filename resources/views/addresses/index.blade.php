@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Addresses</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/addresses/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($addresses as $address)
						<p><a href="{{ URL::to('/addresses/' . $address->address_id) }}">{{ $address->address_id }}</a></p>
						<p>{{ $address->address_country }}</p>
						<p>{{ $address->address_city }}</p>
						<p>{{ $address->address_postalcode }}</p>
						<p>{{ $address->address_street }}</p>
						<p>{{ $address->address_number }}</p>
						<p>{{ $address->address_latitude }}</p>
						<p>{{ $address->address_longitude }}</p>
						<p>{{ Form::open(array('url' => 'addresss/' . $address->address_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection