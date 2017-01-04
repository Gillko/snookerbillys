@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $frame->frame_name }}</h1>
	{{ Form::model($frame, ['method' => 'PUT', 'action' => ['FrameController@update', $frame->frame_id]]) }}
		{{ Form::label('frame_name', 'Name')}}
		{{ Form::text('frame_name', null, ['class' => 'form-control']) }}
		{{ Form::label('frame_scorePlayerHome', 'Score Player Home')}}
		{{ Form::text('frame_scorePlayerHome', null, ['class' => 'form-control']) }}
		{{ Form::label('frame_breakPlayerHome', 'Break Player Home')}}
		{{ Form::text('frame_breakPlayerHome', null, ['class' => 'form-control']) }}
		{{ Form::label('frame_scorePlayerAway', 'Score Player Away')}}
		{{ Form::text('frame_scorePlayerAway', null, ['class' => 'form-control']) }}
		{{ Form::label('frame_breakPlayerAway', 'Break Player Away')}}
		{{ Form::text('frame_breakPlayerAway', null, ['class' => 'form-control']) }}
		{{ Form::label('match_list', 'Matches')}}
		{{ Form::select('match_list[]', $matches, null, ['multiple', 'class' => 'form-control']) }}

		{{ Form::submit('Edit the Frame!', array('class' => '')) }}
	{{ Form::close() }}
@endsection