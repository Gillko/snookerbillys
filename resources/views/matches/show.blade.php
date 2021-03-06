@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $match->match_id }}</h1>
	<a href="{{ URL::to('/matches/' . $match->match_id) }}">{{ $match->match_id }}</a>
	<p>{{ $match->match_scorePlayerHome }}</p>
	<p>{{ $match->match_scorePlayerAway }}</p>

	@unless ($match->players->isEmpty())
		<p>Players:</p>
		@foreach ($match->players as $player)
			<p><a href="{{ URL::to('/players/' . $player->player_id) }}">{{ $player->player_surname }}</a></p>
		@endforeach
	@endunless
	<a href="{{ URL::to('/matches/' . $match->match_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'matches/' . $match->match_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection