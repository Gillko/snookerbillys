@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Players</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
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
				</div>
			</div>
		</div>
	</div>
@endsection