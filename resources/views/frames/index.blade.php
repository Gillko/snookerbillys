@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Frames</h1>
	<a href="{{ URL::to('/frames/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($frames as $frame)
		<p><a href="{{ URL::to('/frames/' . $frame->frame_id) }}">{{ $frame->frame_id }}</a></p>
		<p>{{ $frame->frame_scorePlayerHome }}</p>
		<p>{{ $frame->frame_breakPlayerHome }}</p>
		<p>{{ $frame->frame_scorePlayerAway }}</p>
		<p>{{ $frame->frame_breakPlayerAway }}</p>
		<p>{{ Form::open(array('url' => 'frames/' . $frame->frame_id, 'class' => '')) }}
	@endforeach
@endsection