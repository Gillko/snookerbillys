@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Team {{ $team->team_name }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($team, ['method' => 'PUT', 'action' => ['TeamController@update', $team->team_id]]) }}
						{{ Form::label('team_name', 'Name')}}
						{{ Form::text('team_name') }}

						{{ Form::submit('Edit the Team!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection