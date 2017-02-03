@extends('layouts.layoutBackoffice')
@section('head')
	<script src="../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".addFrame").click(function(){
				$(".addFields").append(
					'<div class="form-group"><label for="frame_name">Frame Name</label><input name="frame_name[]" type="text" id="frame_name" class="form-control"></div><div class="form-group"><label for="frame_scorePlayerHome">Score Player Home</label><input name="frame_scorePlayerHome[]" type="text" id="frame_scorePlayerHome" class="form-control"></div><div class="form-group"><label for="frame_breakPlayerHome">Break Player Home</label><input name="frame_breakPlayerHome[]" type="text" id="frame_breakPlayerHome" class="form-control"></div><div class="form-group"><label for="frame_scorePlayerAway">Score Player Away</label><input name="frame_scorePlayerAway[]" type="text" id="frame_scorePlayerAway" class="form-control"></div><div class="form-group"><label for="frame_breakPlayerAway">Break Player Away</label><input name="frame_breakPlayerAway[]" type="text" id="frame_breakPlayerAway" class="form-control"></div>'
				);
			});
		});
	</script>
@endsection
@section('content')
	<h1>Create a match</h1>
	{{ Form::open(array('url' => 'matches', 'class' => 'formMatch')) }}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		{{ Form::label('seasons', 'Season')}}
		{{ Form::select('season_id', $seasons, null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('locations', 'Location')}}
		{{ Form::select('location_id', $locations, null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('weeks', 'Week')}}
		{{ Form::select('week_id', $weeks, null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('player_list', 'Players')}}
		{{ Form::select('player_list[]', $players, null, ['multiple', 'class' => 'form-control', 'id' => 'players']) }}
	</div>
	<div class="form-group">
		{{ Form::label('match_scorePlayerHome', 'Score Player Home')}}
		{{ Form::text('match_scorePlayerHome', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('match_scorePlayerAway', 'Score Player Away')}}
		{{ Form::text('match_scorePlayerAway', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('frame_name', 'Frame Name')}}
		{{ Form::text('frame_name[]', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('frame_scorePlayerHome', 'Score Player Home')}}
		{{ Form::text('frame_scorePlayerHome[]', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('frame_breakPlayerHome', 'Break Player Home')}}
		{{ Form::text('frame_breakPlayerHome[]', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('frame_scorePlayerAway', 'Score Player Away')}}
		{{ Form::text('frame_scorePlayerAway[]', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('frame_breakPlayerAway', 'Break Player Away')}}
		{{ Form::text('frame_breakPlayerAway[]', null, ['class' => 'form-control']) }}
	</div>

	<div class="addFields form-group">
		
	</div>

	<div class="form-group">
		{{ Form::button('Add another Frame', ['class' => 'addFrame form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Create the Match!', ['class' => 'button expanded form-control']) }}
	</div>

	{{-- {{!! Form::hidden('_token','csrf_token()') !!}} --}}
	{{ Form::close() }}
@endsection