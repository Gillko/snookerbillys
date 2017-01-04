@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Create a Team</h1>
	{{ Form::open(array('url' => 'teams')) }}
		{{ Form::label('team_name', 'Name') }}
		{{ Form::text('team_name', null, ['class' => 'form-control']) }}
		{{ Form::label('addresses', 'Address') }}
		{{ Form::select('address_id', $addresses, null, ['class' => 'form-control']) }}

		{{ Form::submit('Create the Team!', array('class' => '')) }}
	{{ Form::close() }}
@endsection