@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Create a week</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'weeks')) }}
						{{ Form::label('week_name', 'Name')}}
						{{ Form::text('week_name') }}
						{{ Form::label('seasons', 'Season')}}
						{{ Form::select('season_id', $seasons, null) }}

						{{ Form::submit('Create the Week!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection