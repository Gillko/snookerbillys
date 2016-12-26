@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Ranking {{ $ranking->ranking_rank }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($ranking, ['method' => 'PUT', 'action' => ['RankingController@update', $ranking->ranking_id]]) }}
						{{ Form::label('Week') }}
						{{ Form::select('week_id', $week, null) }}
						{{ Form::label('Season') }}
						{{ Form::select('season_id', $season, null) }}
						{{ Form::label('Team') }}
						{{ Form::select('team_id', $team, null) }}
						{{ Form::label('ranking_rank', 'Rank')}}
						{{ Form::text('ranking_rank') }}
						{{ Form::label('ranking_playedMatches', 'Played Matches')}}
						{{ Form::text('ranking_playedMatches') }}
						{{ Form::label('ranking_wonMatches', 'Won Matches')}}
						{{ Form::text('ranking_wonMatches') }}
						{{ Form::label('ranking_drawMatches', 'Draw Matches')}}
						{{ Form::text('ranking_drawMatches') }}
						{{ Form::label('ranking_lostMatches', 'Lost Matches')}}
						{{ Form::text('ranking_lostMatches') }}
						{{ Form::label('ranking_lostFrames', 'Lost Frames')}}
						{{ Form::text('ranking_lostFrames') }}
						{{ Form::label('ranking_wonFrames', 'Won Frames')}}
						{{ Form::text('ranking_wonFrames') }}

						{{ Form::submit('Edit the Ranking!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection