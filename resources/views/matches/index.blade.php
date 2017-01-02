@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Matches</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
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
				</div>
			</div>
		</div>
	</div>
@endsection