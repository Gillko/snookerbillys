@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Rankings</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
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
				</div>
			</div>
		</div>
	</div>
@endsection