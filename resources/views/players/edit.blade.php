@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $player->player_firstname }} {{ $player->player_surname }}</h1>
	{{ Form::model($player, ['method' => 'PUT', 'action' => ['PlayerController@update', $player->player_id]]) }}
		{{ Form::label('Team') }}
		{{ Form::select('team_id', $team, null, ['class' => 'form-control']) }}
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

		{{ Form::submit('Edit the Player!', array('class' => '')) }}
	{{ Form::close() }}
@endsection