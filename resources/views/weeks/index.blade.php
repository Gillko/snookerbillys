@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Weeks</h1>
	<a href="{{ URL::to('/weeks/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($weeks as $week)
		<p><a href="{{ URL::to('/weeks/' . $week->week_id) }}">{{ $week->week_id }}</a></p>
		<p>{{ $week->week_name }}</p>
		<p>{{ $week->week_start }}</p>
		<p>{{ $week->week_day }}</p>
		<p>{{ $week->week_date }}</p>
		<p>{{ $week->week_location }}</p>
		<p>{{ $week->week_scoreTeamHome }}</p>
		<p>{{ $week->week_scoreTeamAway }}</p>
		@unless ($week->teams->isEmpty())
			<p>Teams:</p>
			@foreach ($week->teams as $team)
				<p><a href="{{ URL::to('/teams/' . $team->team_id) }}">{{ $team->team_name }}</a></p>
			@endforeach
		@endunless
		<p>{{ Form::open(array('url' => 'weeks/' . $week->week_id, 'class' => '')) }}
	@endforeach
@endsection