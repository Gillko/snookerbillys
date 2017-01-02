@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Create a frame</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'frames')) }}
						{{ Form::label('frame_name', 'Name')}}
						{{ Form::text('frame_name') }}
						{{ Form::label('frame_scorePlayerHome', 'Score Player Home')}}
						{{ Form::text('frame_scorePlayerHome') }}
						{{ Form::label('frame_breakPlayerHome', 'Break Player Home')}}
						{{ Form::text('frame_breakPlayerHome') }}
						{{ Form::label('frame_scorePlayerAway', 'Score Player Away')}}
						{{ Form::text('frame_scorePlayerAway') }}
						{{ Form::label('frame_breakPlayerAway', 'Break Player Away')}}
						{{ Form::text('frame_breakPlayerAway') }}
						{{ Form::label('match_list', 'Matches')}}
						{{ Form::select('match_list[]', $matches, null, ['multiple']) }}

						{{ Form::submit('Create the Frame!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection