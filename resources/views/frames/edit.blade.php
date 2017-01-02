@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Edit: {{ $frame->frame_id }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($frame, ['method' => 'PUT', 'action' => ['FrameController@update', $frame->frame_id]]) }}
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

						{{ Form::submit('Edit the Frame!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection