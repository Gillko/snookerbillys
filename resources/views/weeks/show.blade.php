@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $week->week_name }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/weeks/' . $week->week_id) }}">{{ $week->week_id }}</a>
					<p>{{ $week->week_name }}</p>
					<p>{{ $week->week_location }}</p>
					<p>{{ $week->week_scoreTeamHome }}</p>
					<p>{{ $week->week_scoreTeamAway }}</p>
					@unless ($week->teams->isEmpty())
						<p>Teams:</p>
						@foreach ($week->teams as $team)
							<p><a href="{{ URL::to('/teams/' . $team->team_id) }}">{{ $team->team_name }}</a></p>
						@endforeach
					@endunless
					<a href="{{ URL::to('/weeks/' . $week->week_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'categories/' . $week->week_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection