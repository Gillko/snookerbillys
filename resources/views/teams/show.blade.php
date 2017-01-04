@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $team->team_name }}</h1>
	<p>{{ $team->team_id }}</p>
	<p>{{ $team->team_name }}</p>
	<a href="{{ URL::to('/teams/' . $team->team_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'categories/' . $team->team_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection