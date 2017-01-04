<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<!-- META FACEBOOK SHARE-->
		<meta property="og:title" content="" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="" />
		<meta property="og:description" content="" />
		<meta property="og:image" content="" />
		<meta property="og:image:url" content="" />
		<title>Snookerbilly's</title>
		<link rel="shortcut icon" href="" type="image/x-icon">
		<link rel="icon" href="" type="image/x-icon">
		<link href="{{ url('assets/css/libraries/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ url('assets/css/app.css') }}" rel="stylesheet" type="text/css">
		@yield('head')
	</head>
	<body>
		<div class="container-gv">
			<div class="content-gv">
				<div class="row">
					<div class="col-md-4">
						<h1>Backoffice Snookerbilly's</h1>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="{{ url('addresses') }}">Addresses</a></li>
							<li><a href="{{ url('frames') }}">Frames</a></li>
							<li><a href="{{ url('matches') }}">Matches</a></li>
							<li><a href="{{ url('players') }}">Players</a></li>
							<li><a href="{{ url('rankings') }}">Rankings</a></li>
							<li><a href="{{ url('seasons') }}">Seasons</a></li>
							<li><a href="{{ url('teams') }}">Teams</a></li>
							<li><a href="{{ url('weeks') }}">Weeks</a></li>
						</ul>
					</div>
					<div class="col-md-8">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
		<script src="{{ url('assets/js/libraries/bootstrap/bootstrap.min.js') }}"></script>
		@yield('bottom-scripts')
	</body>
</html>