@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Create a Player</h1>
	{{ Form::open(array('url' => 'players')) }}
		{{ Form::label('player_firstname', 'Firstname')}}
		{{ Form::text('player_firstname', null, ['class' => 'form-control']) }}
		{{ Form::label('player_surname', 'Surname')}}
		{{ Form::text('player_surname', null, ['class' => 'form-control']) }}
		{{ Form::label('player_nickname', 'Nickname')}}
		{{ Form::text('player_nickname', null, ['class' => 'form-control']) }}
		{{ Form::label('player_highestBreakTraining', 'Highest Break Training')}}
		{{ Form::text('player_highestBreakTraining', null, ['class' => 'form-control']) }}
		{{ Form::label('player_highestBreakOfficial', 'Official Highest Break')}}
		{{ Form::text('player_highestBreakOfficial', null, ['class' => 'form-control']) }}
		{{ Form::label('player_cue', 'Cue')}}
		{{ Form::text('player_cue', null, ['class' => 'form-control']) }}
		{{ Form::label('teams', 'Team')}}
		{{ Form::select('team_id', $teams, null, ['class' => 'form-control']) }}

		{{ Form::submit('Create the Player!', array('class' => '')) }}
	{{ Form::close() }}
@endsection