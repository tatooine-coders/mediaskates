<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }} :: MEMBER :: {{ config('app.name') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- CSS reset and simple style -->
        <link rel="stylesheet" href="{{ url('css/member.css') }}">

        <!-- Scripts -->
        <script>
					window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>
    <body>
		<nav>
			{{ link_to('/', config('app.name')) }}
		  
				<li>{{ link_to('/', 'Home') }}</li>
				<li>{{ link_to(route('event.index'), 'Events') }}</li>
				<li>{{ link_to(route('photo.index'), 'Photos') }}</li>
				<li>{{ link_to(route('user.index'), 'Photographs') }}</li>
				<li>{{ link_to(route('advanced_search'), 'Advanced search') }}</li>
			</ul>
			
		</nav>

		<div class="uk-offcanvas">
			<div class="uk-offcanvas-bar uk-offcanvas-bar-show" mode="push">
				<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
					<li class="title-big">Public</li>

					@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
					@else
					<li class="title-sub">User {{ Auth::user()->pseudo }}</li>
					<li>
						<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
					</li>
					@endif
				</ul>
				@role(('member'))
				<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
					<li class="title-big">Users</li>
					<li class="title-sub">Comments</li>
					<li>{{ link_to(route('user.comment.index'), 'Manage') }}</li>
					<li class="title-sub">User</li>
					<li>{{ link_to(route('user.dashboard'), 'Dashboard') }}</li>
					<li>{{ link_to(route('user.preferences'), 'Preferences') }}</li>
					<li>{{ link_to(route('user.personnal_infos'), 'Personnal informations') }}</li>
					<li>{{ link_to(route('user.update_passwd'), 'Update password') }}</li>
					<li>{{ link_to(route('user.logout'), 'Log out') }}</li>
					<li>{{ link_to(route('user.close_account'), 'Close account') }}</li>
					<li class="title">Tags</li>
					<li>{{ link_to(route('user.tag.index'), 'Manage') }}</li>
					<li class="title">Votes</li>
					<li>{{ link_to(route('user.vote.index'), 'Manage') }}</li>
					@role(('photograph'))
					<li class="title-sub">Photograph</li>
					<li class="title">Events</li>
					<li>{{ link_to(route('user.event.index'), 'Manage') }}</li>
					<li>{{ link_to(route('user.event.create'), 'Add') }}</li>
					<li class="title">Photos</li>
					<li>{{ link_to(route('user.photo.index'), 'Manage') }}</li>
					<li>{{ link_to(route('user.photo.create'), 'Add') }}</li>
					@endrole
				</ul>
				@endrole
			</div>
		</div>
		<div class="uk-grid">
			<div class="uk-width-1-1">
				<h1>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }}</h1>
			</div>
		</div>
		<div class="uk-grid uk-grid-divider">
			<div class="uk-width-large-1-10 uk-width-medium-2-10 uk-width-small-3-10">
				<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
			</div>
			<div class="uk-width-large-9-10 uk-width-medium-8-10 uk-width-small-7-10">
				<!-- Errors -->
				@if (count($errors) > 0)
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				<!-- /Errors -->

				<!-- Content -->
				<div id="content">
					@yield('content')
				</div>
				<!-- /Content -->
			</div>
		</div>
		<footer>
			<ul>
				<li>{{ link_to(route('pages', 'legal'), 'Terms of service') }}</li>
			</ul>
		</footer>
        <script src="{{ url('js/vendor/jquery.min.js') }}"></script>
        <script src="{{ url('js/vendor/uikit.min.js') }}"></script>
        <script src="{{ url('js/vendor/uikit/dropdown.js') }}"></script>
    </body>
</html>
