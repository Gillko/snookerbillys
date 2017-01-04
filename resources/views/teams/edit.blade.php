@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $team->team_name }}</h1>
	{{ Form::model($team, ['method' => 'PUT', 'action' => ['TeamController@update', $team->team_id]]) }}
		{{ Form::label('team_name', 'Name')}}
		{{ Form::text('team_name', null, ['class' => 'form-control']) }}

		{{ Form::submit('Edit the Team!', array('class' => '')) }}
	{{ Form::close() }}
@endsection