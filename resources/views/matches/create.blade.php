@extends('layouts.layout')
@section('head')
<script src="../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
<script>
	$(document).ready(function(){
		$(".addFrame").click(function(){
			$(".addFields").append(
				'<label for="frame_name">Name</label><input name="frame_name[]" type="text" id="frame_name"><label for="frame_scorePlayerHome">Score Player Home</label><input name="frame_scorePlayerHome[]" type="text" id="frame_scorePlayerHome"><label for="frame_breakPlayerHome">Break Player Home</label><input name="frame_breakPlayerHome[]" type="text" id="frame_breakPlayerHome"><label for="frame_scorePlayerAway">Score Player Away</label><input name="frame_scorePlayerAway[]" type="text" id="frame_scorePlayerAway"><label for="frame_breakPlayerAway">Break Player Away</label><input name="frame_breakPlayerAway[]" type="text" id="frame_breakPlayerAway">'
			);
		});
	});
</script>
@endsection
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Create a match</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'matches', 'class' => 'formMatch')) }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						{{ Form::label('seasons', 'Season')}}
						{{ Form::select('season_id', $seasons, null) }}
						{{ Form::label('locations', 'Location')}}
						{{ Form::select('location_id', $locations, null) }}
						{{ Form::label('weeks', 'Week')}}
						{{ Form::select('week_id', $weeks, null) }}
						{{ Form::label('player_list', 'Players')}}
						{{ Form::select('player_list[]', $players, null, ['multiple']) }}
						{{ Form::label('match_scorePlayerHome', 'Score Player Home')}}
						{{ Form::text('match_scorePlayerHome') }}
						{{ Form::label('match_scorePlayerAway', 'Score Player Away')}}
						{{ Form::text('match_scorePlayerAway') }}

						{{ Form::label('frame_name', 'Name')}}
						{{ Form::text('frame_name[]') }}
						{{ Form::label('frame_scorePlayerHome', 'Score Player Home')}}
						{{ Form::text('frame_scorePlayerHome[]') }}
						{{ Form::label('frame_breakPlayerHome', 'Break Player Home')}}
						{{ Form::text('frame_breakPlayerHome[]') }}
						{{ Form::label('frame_scorePlayerAway', 'Score Player Away')}}
						{{ Form::text('frame_scorePlayerAway[]') }}
						{{ Form::label('frame_breakPlayerAway', 'Break Player Away')}}
						{{ Form::text('frame_breakPlayerAway[]') }}

						{{ Form::button('Add another Frame', ['class' => 'addFrame']) }}
						<div class="addFields"></div>

						{{ Form::submit('Create the Match!', array('class' => 'button expanded')) }}

						{{-- {{!! Form::hidden('_token','csrf_token()') !!}} --}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection