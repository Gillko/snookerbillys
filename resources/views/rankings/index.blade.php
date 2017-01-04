@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Rankings</h1>
	<a href="{{ URL::to('/rankings/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	<table>
		<tr>
			<th>ID</th>
			<th>Rank</th>
			<th>Team</th> 
			<th>Played Matches</th>
			<th>Won Matches</th>
			<th>Draw Matches</th>
			<th>Lost Matches</th>
			<th>Lost Frames</th>
			<th>Won Frames</th>
		</tr>
		@foreach($rankings as $ranking)
			<tr>
				<td><a href="{{ URL::to('/rankings/' . $ranking->ranking_id) }}">{{ $ranking->ranking_id }}</a></td>
				<td>{{ $ranking->ranking_rank }}</td>
				<td>{{ $ranking->team->team_name }}</td>
				<td>{{ $ranking->ranking_playedMatches }}</td>
				<td>{{ $ranking->ranking_wonMatches }}</td>
				<td>{{ $ranking->ranking_drawMatches }}</td>
				<td>{{ $ranking->ranking_lostMatches }}</td>
				<td>{{ $ranking->ranking_lostFrames }}</td>
				<td>{{ $ranking->ranking_wonFrames }}</td>
			</tr>
			<p>{{ Form::open(array('url' => 'rankings/' . $ranking->ranking_id, 'class' => '')) }}
		@endforeach
	</table>
@endsection