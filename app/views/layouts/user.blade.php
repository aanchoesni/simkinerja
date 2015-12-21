<!DOCTYPE html>
<<html>
<head>
	<title>@yield('title') | SIM Kinerja LPPM</title>
	<link rel="stylesheet" href="{{ assets('packages/uikit/css/uikit.alomost-flat.min.css') }}">
	<script type="{{ asset('components/jquery/jquery.min.js') }}"></script>
	<script type="{{ asset('pakages/uikit/js/uikit.min.js') }}"></script>
</head>
<body>
	<div class="uk-container uk-container-center uk-margin-top">
		<nav class="uk-navbar">
			<a href="#" class="uk-navbar-brand uk-hidden-small">SIM KINERJA LPPM</a>
			<ul class="uk-navbar-nav uk-hidden-small">
				@yield('nav')
			</ul>
			<div class="uk-navbar-flip uk-navbar-content">
				<a href="#">Admin</a>
				<a href="#">Logout</a>
			</div>
			<div class="uk-navbar-brand uk-navbar-center uk-visible-small">SIM KINERJA LPPM</div>
		</nav>
		<div class="uk-container-center uk-margin-top">
			<ul class="uk-breadcrumb">
				@yield('breadcrumb')
			</ul>
			<h1 class="uk-heading-large">@yield('title')</h1>
				@yield('content')
		</div>
	</div>
</body>
</html>