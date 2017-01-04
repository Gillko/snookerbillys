@extends('layouts.layoutBackoffice')
@section('head')
	<link href="../../assets/css/libraries/jquery/jquery-ui.css" rel="stylesheet">
	<link href="../../assets/css/libraries/jquery/style.css" rel="stylesheet">
	<script src="../../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
	<script src="../../assets/js/libraries/jquery/jquery-ui.js"></script>
	<script>
		$(function() {
			$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
		});
	</script>
@endsection
@section('content')
	<h1>{{ $week->week_name }}</h1>
	{{ Form::model($week, ['method' => 'PUT', 'action' => ['WeekController@update', $week->week_id]]) }}
		{{ Form::label('week_name', 'Name')}}
		{{ Form::text('week_name', null, ['class' => 'form-control']) }}
		{{ Form::label('week_start', 'Start')}}
		{{ Form::text('week_start', null, ['class' => 'datepicker form-control']) }}
		{{ Form::label('week_day', 'Day')}}
		{{ Form::text('week_day', null, ['class' => 'form-control']) }}
		{{ Form::label('week_date', 'Date')}}
		{{ Form::text('week_date', null, ['class' => 'datepicker form-control']) }}
		{{ Form::label('week_scoreTeamHome', 'Home Team')}}
		{{ Form::text('week_scoreTeamHome', null, ['class' => 'form-control']) }}
		{{ Form::label('week_scoreTeamAway', 'Away Team')}}
		{{ Form::text('week_scoreTeamAway', null, ['class' => 'form-control']) }}
		{{ Form::label('team_list', 'Teams')}}
		{{ Form::select('team_list[]', $teams, null, ['multiple', 'class' => 'form-control']) }}
		{{ Form::label('seasons', 'Season')}}
		{{ Form::select('season_id', $seasons, null, ['class' => 'form-control']) }}
		{{ Form::label('locations', 'Location')}}
		{{ Form::select('location_id', $locations, null, ['class' => 'form-control']) }}

		{{ Form::submit('Edit the Week!', array('class' => '')) }}
	{{ Form::close() }}
@endsection