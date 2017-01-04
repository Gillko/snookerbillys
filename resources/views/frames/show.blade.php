@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $frame->frame_id }}</h1>
	<a href="{{ URL::to('/frames/' . $frame->frame_id) }}">{{ $frame->frame_id }}</a>
	<p>{{ $frame->frame_name }}</p>
	<p>{{ $frame->frame_scorePlayerHome }}</p>
	<p>{{ $frame->frame_breakPlayerHome }}</p>
	<p>{{ $frame->frame_scorePlayerAway }}</p>
	<p>{{ $frame->frame_breakPlayerAway }}</p>
	
	<a href="{{ URL::to('/frames/' . $frame->frame_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'frames/' . $frame->frame_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection