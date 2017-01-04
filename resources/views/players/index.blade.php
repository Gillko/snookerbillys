@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Players</h1>
	<a href="{{ URL::to('/players/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	<table>
		<tr>
			<th>ID</th>
			<th>Firstname</th>
			<th>Surname</th> 
			<th>Nickname</th>
			<th>Highest Break Trainning</th>
			<th>Highest Break Official</th>
			<th>Cue</th>
			<th>Team</th>
		</tr>
		@foreach($players as $player)
			<tr>
				<td><a href="{{ URL::to('/players/' . $player->player_id) }}">{{ $player->player_id }}</a></td>
				<td>{{ $player->player_firstname }}</td>
				<td>{{ $player->player_surname }}</td>
				<td>{{ $player->player_nickname }}</td>
				<td>{{ $player->player_highestBreakTraining }}</td>
				<td>{{ $player->player_highestBreakOfficial }}</td>
				<td>{{ $player->player_cue }}</td>
				<td>{{ $player->team->team_name }}</td>
			</tr>
			<p>{{ Form::open(array('url' => 'players/' . $player->player_id, 'class' => '')) }}
		@endforeach
	</table>
@endsection