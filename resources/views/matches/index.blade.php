@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Matches</h1>
	<a href="{{ URL::to('/matches/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($matches as $match)
		<p><a href="{{ URL::to('/matches/' . $match->match_id) }}">{{ $match->match_id }}</a></p>
		<p>{{ $match->match_scorePlayerHome }}</p>
		<p>{{ $match->match_scorePlayerAway }}</p>
		@unless ($match->players->isEmpty())
			<p>Players:</p>
			@foreach ($match->players as $player)
				<p><a href="{{ URL::to('/players/' . $player->player_id) }}">{{ $player->player_surname }}</a></p>
			@endforeach
		@endunless
		<p>{{ Form::open(array('url' => 'matches/' . $match->match_id, 'class' => '')) }}
	@endforeach
@endsection