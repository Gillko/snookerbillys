@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Teams</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/teams/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($teams as $team)
						<p><a href="{{ URL::to('/teams/' . $team->team_id) }}">{{ $team->team_id }}</a></p>
						<p>{{ $team->team_name }}</p>
						<p>{{ Form::open(array('url' => 'teams/' . $team->team_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection