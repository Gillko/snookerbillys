@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $season->season_years }}</h1>
	<p>{{ $season->season_id }}</p>
	<p>{{ $season->season_years }}</p>
	<p>{{ $season->season_start }}</p>
	<p>{{ $season->season_end }}</p>
	<a href="{{ URL::to('/seasons/' . $season->season_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'categories/' . $season->season_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection