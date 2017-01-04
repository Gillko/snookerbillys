@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $player->player_firstname }} {{ $player->player_surname }}</h1>
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
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection