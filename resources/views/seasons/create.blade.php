@extends('layouts.layoutBackoffice')
@section('head')
	<link href="../assets/css/libraries/jquery/jquery-ui.css" rel="stylesheet">
	<link href="../assets/css/libraries/jquery/style.css" rel="stylesheet">
	<script src="../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
	<script src="../assets/js/libraries/jquery/jquery-ui.js"></script>
	<script>
		$(function() {
			$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
		});
	</script>
@endsection
@section('content')
	<h1>Create a Season</h1>
	{{ Form::open(array('url' => 'seasons')) }}
		{{ Form::label('season_years', 'Season')}}
		{{ Form::text('season_years', null, ['class' => 'form-control']) }}
		{{ Form::label('season_start', 'Start')}}
		{{ Form::text('season_start', null, ['class' => 'datepicker form-control']) }}
		{{ Form::label('season_end', 'End')}}
		{{ Form::text('season_end', null, ['class' => 'datepicker form-control']) }}

		{{ Form::submit('Create the Season!', array('class' => '')) }}
	{{ Form::close() }}
@endsection