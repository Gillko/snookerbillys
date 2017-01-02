@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Team {{ $player->player_rank }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/players/' . $player->player_id) }}">{{ $player->player_id }}</a>
					<p>{{ $player->player_firstname }}</p>
					<p>{{ $player->player_surname }}</p>
					<p>{{ $player->player_nickname }}</p>
					<p>{{ $player->player_highestBreakTraining }}</p>
					<p>{{ $player->player_highestBreakOfficial }}</p>
					<p>{{ $player->player_cue }}</p>
					<a href="{{ URL::to('/players/' . $player->player_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'categories/' . $player->player_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection