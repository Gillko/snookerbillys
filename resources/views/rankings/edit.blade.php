@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $ranking->ranking_rank }} {{ $ranking->team->team_name }}</h1>
	{{ Form::model($ranking, ['method' => 'PUT', 'action' => ['RankingController@update', $ranking->ranking_id]]) }}
		{{ Form::label('Week') }}
		{{ Form::select('week_id', $week, null, ['class' => 'form-control']) }}
		{{ Form::label('Season') }}
		{{ Form::select('season_id', $season, null, ['class' => 'form-control']) }}
		{{ Form::label('Team') }}
		{{ Form::select('team_id', $team, null, ['class' => 'form-control']) }}
		{{ Form::label('ranking_rank', 'Rank')}}
		{{ Form::text('ranking_rank', null, ['class' => 'form-control']) }}
		{{ Form::label('ranking_playedMatches', 'Played Matches')}}
		{{ Form::text('ranking_playedMatches', null, ['class' => 'form-control']) }}
		{{ Form::label('ranking_wonMatches', 'Won Matches')}}
		{{ Form::text('ranking_wonMatches', null, ['class' => 'form-control']) }}
		{{ Form::label('ranking_drawMatches', 'Draw Matches')}}
		{{ Form::text('ranking_drawMatches', null, ['class' => 'form-control']) }}
		{{ Form::label('ranking_lostMatches', 'Lost Matches')}}
		{{ Form::text('ranking_lostMatches', null, ['class' => 'form-control']) }}
		{{ Form::label('ranking_lostFrames', 'Lost Frames')}}
		{{ Form::text('ranking_lostFrames', null, ['class' => 'form-control']) }}
		{{ Form::label('ranking_wonFrames', 'Won Frames')}}
		{{ Form::text('ranking_wonFrames', null, ['class' => 'form-control']) }}

		{{ Form::submit('Edit the Ranking!', array('class' => '')) }}
	{{ Form::close() }}
@endsection