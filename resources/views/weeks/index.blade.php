@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Weeks</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/weeks/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($weeks as $week)
						<p><a href="{{ URL::to('/weeks/' . $week->week_id) }}">{{ $week->week_id }}</a></p>
						<p>{{ $week->week_name }}</p>
						<p>{{ Form::open(array('url' => 'weeks/' . $week->week_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection