@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>Create a Team</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'teams')) }}
						{{ Form::label('team_name', 'Name') }}
						{{ Form::text('team_name') }}
						{{ Form::label('addresses', 'Address') }}
						{{ Form::select('address_id', $addresses, null) }}

						{{ Form::submit('Create the Team!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection