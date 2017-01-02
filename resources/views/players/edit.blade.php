@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Player {{ $player->player_rank }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($player, ['method' => 'PUT', 'action' => ['PlayerController@update', $player->player_id]]) }}
						{{ Form::label('Team') }}
						{{ Form::select('team_id', $team, null) }}
						{{ Form::label('player_firstname', 'Firstname')}}
						{{ Form::text('player_firstname') }}
						{{ Form::label('player_surname', 'Surname')}}
						{{ Form::text('player_surname') }}
						{{ Form::label('player_nickname', 'Nickname')}}
						{{ Form::text('player_nickname') }}
						{{ Form::label('player_highestBreakTraining', 'Highest Break Training')}}
						{{ Form::text('player_highestBreakTraining') }}
						{{ Form::label('player_highestBreakOfficial', 'Official Highest Break')}}
						{{ Form::text('player_highestBreakOfficial') }}
						{{ Form::label('player_cue', 'Cue')}}
						{{ Form::text('player_cue') }}

						{{ Form::submit('Edit the Player!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection