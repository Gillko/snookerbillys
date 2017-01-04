@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Create a Ranking</h1>
	{{ Form::open(array('url' => 'rankings')) }}
		{{ Form::label('weeks', 'Week')}}
		{{ Form::select('week_id', $weeks, null, ['class' => 'form-control']) }}
		{{ Form::label('seasons', 'Season')}}
		{{ Form::select('season_id', $seasons, null, ['class' => 'form-control']) }}
		{{ Form::label('teams', 'Team')}}
		{{ Form::select('team_id', $teams, null, ['class' => 'form-control']) }}
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

		{{ Form::submit('Create the Ranking!', array('class' => '')) }}
	{{ Form::close() }}
@endsection