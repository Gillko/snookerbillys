@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Seasons</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/seasons/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($seasons as $season)
						<p><a href="{{ URL::to('/seasons/' . $season->season_id) }}">{{ $season->season_id }}</a></p>
						<p>{{ $season->season_years }}</p>
						<p>{{ $season->season_start }}</p>
						<p>{{ $season->season_end }}</p>
						<p>{{ Form::open(array('url' => 'seasons/' . $season->season_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection