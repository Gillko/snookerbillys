@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Teams</h1>
	<a href="{{ URL::to('/teams/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($teams as $team)
		<p><a href="{{ URL::to('/teams/' . $team->team_id) }}">{{ $team->team_id }}</a></p>
		<p>{{ $team->team_name }}</p>
		<p>{{ Form::open(array('url' => 'teams/' . $team->team_id, 'class' => '')) }}
	@endforeach
@endsection