@extends('layouts.layout')
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
					{{ Form::open(array('url' => 'matches')) }}
						{{ Form::label('match_scorePlayerHome', 'Score Player Home')}}
						{{ Form::text('match_scorePlayerHome') }}
						{{ Form::label('match_scorePlayerAway', 'Score Player Away')}}
						{{ Form::text('match_scorePlayerAway') }}
						{{ Form::label('player_list', 'Players')}}
						{{ Form::select('player_list[]', $players, null, ['multiple']) }}
						{{ Form::label('week_list', 'Weeks')}}
						{{ Form::select('week_list[]', $weeks, null, ['multiple']) }}

						{{ Form::submit('Create the Match!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection