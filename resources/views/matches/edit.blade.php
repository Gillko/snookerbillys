@extends('layouts.layoutBackoffice')
@section('content')
	<h1>
		@foreach ($match->players as $player)
			{{ $player->player_firstname }} {{ $player->player_surname }}
		@endforeach
	</h1>
	{{ Form::model($match, ['method' => 'PUT', 'action' => ['MatchController@update', $match->match_id]]) }}
		{{ Form::label('match_scorePlayerHome', 'Score Player Home')}}
		{{ Form::text('match_scorePlayerHome', null, ['class' => 'form-control']) }}
		{{ Form::label('match_scorePlayerAway', 'Score Player Away')}}
		{{ Form::text('match_scorePlayerAway', null, ['class' => 'form-control']) }}
		{{ Form::label('seasons', 'Season')}}
		{{ Form::select('season_id', $seasons, null, ['class' => 'form-control']) }}
		{{ Form::label('locations', 'Location')}}
		{{ Form::select('location_id', $locations, null, ['class' => 'form-control']) }}
		{{ Form::label('weeks', 'Week')}}
		{{ Form::select('week_id', $weeks, null, ['class' => 'form-control']) }}
		{{ Form::label('player_list', 'Players')}}
		{{ Form::select('player_list[]', $players, null, ['multiple', 'class' => 'form-control']) }}

		{{ Form::submit('Edit the Match!', array('class' => '')) }}
	{{ Form::close() }}
@endsection