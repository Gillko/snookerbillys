@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $match->match_id }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
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
					{{ Form::open(array('url' => 'categories/' . $match->match_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection