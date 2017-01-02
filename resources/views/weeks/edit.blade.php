@extends('layouts.layout')
@section('head')
	<link href="../../assets/css/libraries/jquery/jquery-ui.css" rel="stylesheet">
	<link href="../../assets/css/libraries/jquery/style.css" rel="stylesheet">
	<script src="../../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
	<script src="../../assets/js/libraries/jquery/jquery-ui.js"></script>
	<script>
		$(function() {
			//$(".datepicker").datepicker();
			$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
		});
	</script>
@endsection
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Edit: {{ $week->week_name }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($week, ['method' => 'PUT', 'action' => ['WeekController@update', $week->week_id]]) }}
						{{ Form::label('week_name', 'Name')}}
						{{ Form::text('week_name') }}
						{{ Form::label('week_start', 'Start')}}
						{{ Form::text('week_start', null, ['class' => 'datepicker']) }}
						{{ Form::label('week_day', 'Day')}}
						{{ Form::text('week_day') }}
						{{ Form::label('week_date', 'Date')}}
						{{ Form::text('week_date', null, ['class' => 'datepicker']) }}
						{{ Form::label('week_scoreTeamHome', 'Home Team')}}
						{{ Form::text('week_scoreTeamHome') }}
						{{ Form::label('week_scoreTeamAway', 'Away Team')}}
						{{ Form::text('week_scoreTeamAway') }}
						{{ Form::label('team_list', 'Teams')}}
						{{ Form::select('team_list[]', $teams, null, ['multiple']) }}
						{{ Form::label('seasons', 'Season')}}
						{{ Form::select('season_id', $seasons, null) }}
						{{ Form::label('locations', 'Location')}}
						{{ Form::select('location_id', $locations, null) }}

						{{ Form::submit('Edit the Week!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection