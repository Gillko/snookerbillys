@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $address->address_id }}</h1>
	<a href="{{ URL::to('/addresses/' . $address->address_id) }}">{{ $address->address_id }}</a>
	<p>{{ $address->address_country }}</p>
	<p>{{ $address->address_city }}</p>
	<p>{{ $address->address_postalcode }}</p>
	<p>{{ $address->address_street }}</p>
	<p>{{ $address->address_number }}</p>
	<p>{{ $address->address_latitude }}</p>
	<p>{{ $address->address_longitude }}</p>

	<a href="{{ URL::to('/addresses/' . $address->address_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'addresses/' . $address->address_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection