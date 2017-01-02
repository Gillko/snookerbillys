@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>Frames</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/frames/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($frames as $frame)
						<p><a href="{{ URL::to('/frames/' . $frame->frame_id) }}">{{ $frame->frame_id }}</a></p>
						<p>{{ $frame->frame_scorePlayerHome }}</p>
						<p>{{ $frame->frame_breakPlayerHome }}</p>
						<p>{{ $frame->frame_scorePlayerAway }}</p>
						<p>{{ $frame->frame_breakPlayerAway }}</p>
						<p>{{ Form::open(array('url' => 'frames/' . $frame->frame_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection