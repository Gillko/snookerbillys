@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Team {{ $ranking->ranking_rank }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/rankings/' . $ranking->ranking_id) }}">{{ $ranking->ranking_id }}</a>
					<p>{{ $ranking->ranking_rank }}</p>
					<p>{{ $ranking->team->team_name }}</p>
					<p>{{ $ranking->ranking_playedMatches }}</p>
					<p>{{ $ranking->ranking_wonMatches }}</p>
					<p>{{ $ranking->ranking_drawMatches }}</p>
					<p>{{ $ranking->ranking_lostMatches }}</p>
					<p>{{ $ranking->ranking_lostFrames }}</p>
					<p>{{ $ranking->ranking_wonFrames }}</p>
					<a href="{{ URL::to('/rankings/' . $ranking->ranking_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'categories/' . $ranking->ranking_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection