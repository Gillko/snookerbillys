@extends('layouts.layout')
@section('head')
	<link href="../assets/css/libraries/jquery/jquery-ui.css" rel="stylesheet">
	<link href="../assets/css/libraries/jquery/style.css" rel="stylesheet">
	<script src="../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
	<script src="../assets/js/libraries/jquery/jquery-ui.js"></script>
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
					<h1>Create a Season</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'seasons')) }}
						{{ Form::label('season_years', 'Season')}}
						{{ Form::text('season_years') }}
						{{ Form::label('season_start', 'Start')}}
						{{ Form::text('season_start', null, ['class' => 'datepicker']) }}
						{{ Form::label('season_end', 'End')}}
						{{ Form::text('season_end', null, ['class' => 'datepicker']) }}

						{{ Form::submit('Create the Season!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection