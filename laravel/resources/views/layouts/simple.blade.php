<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="{{ url('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/main.css') }}">

        <style>
            .menu{list-style-type: none; border-bottom:1px solid #333; padding: 5px 0; margin:0; font-size:0.8em}
            .menu li{display: inline; padding-right: 10px;}
            .menu li.title{border-left:3px solid #333; padding-left:3px;}
            .title-big{font-variant: small-caps; font-size:1.2em;}
            .title-sub{font-weight: bold; font-size:1.1em;}
        </style>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <ul class="menu">
            <li class="title-big">Public</li>
            <li>{{ link_to('/', 'Home') }}</li>
            <li>{{ link_to(route('event.index'), 'Events') }}</li>
            <li>{{ link_to(route('photo.index'), 'Photos') }}</li>
            <li>{{ link_to(route('tag.index'), 'Tags') }}</li>
            <li>{{ link_to(route('user.index'), 'Photographs') }}</li>
            <li>{{ link_to(route('advanced_search'), 'Advanced search') }}</li>
            <li>{{ link_to(route('pages', 'legal'), 'Terms of service') }}</li>
            <li>{{ link_to('/register', 'Register') }}</li>
            <li>{{ link_to('/login', 'Login') }}</li>
        </ul>
        <ul class="menu">
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
            <li class="title-sub">Photograph</li>
            <li class="title">Events</li>
            <li>{{ link_to(route('user.event.index'), 'Manage') }}</li>
            <li>{{ link_to(route('user.event.create'), 'Add') }}</li>
            <li class="title">Photos</li>
            <li>{{ link_to(route('user.photo.index'), 'Manage') }}</li>
            <li>{{ link_to(route('user.photo.create'), 'Add') }}</li>
        </ul>
        <ul class="menu">
            <li class="title-big">Admin</li>
            <li class="title">Comments</li>
            <li>{{ link_to(route('admin.comment.index'), 'Manage') }}</li>
            <li class="title">Disciplines</li>
            <li>{{ link_to(route('admin.discipline.index'), 'Manage') }}</li>
            <li>{{ link_to(route('admin.discipline.create'), 'Add') }}</li>
            <li class="title">Events</li>
            <li>{{ link_to(route('admin.event.index'), 'Manage') }}</li>
            <li>{{ link_to(route('admin.event.create'), 'Add') }}</li>
            <li class="title">Licenses</li>
            <li>{{ link_to(route('admin.photo.index'), 'Manage') }}</li>
            <li>{{ link_to(route('admin.photo.create'), 'Add') }}</li>
            <li class="title">Photos</li>
            <li>{{ link_to(route('admin.photo.index'), 'Manage') }}</li>
            <li class="title-sub">Roles</li>
            <li>{{ link_to(route('admin.role.index'), 'Manage') }}</li>
            <li>{{ link_to(route('admin.role.create'), 'Add') }}</li>
            <li class="title-sub">Tags</li>
            <li>{{ link_to(route('admin.tag.index'), 'Manage') }}</li>
            <li class="title-sub">Users</li>
            <li>{{ link_to(route('admin.user.index'), 'Manage') }}</li>
            <li>{{ link_to(route('admin.user.create'), 'Add') }}</li>
            <li class="title-sub">Watermarks</li>
            <li>{{ link_to(route('admin.watermark.index'), 'Manage') }}</li>
            <li>{{ link_to(route('admin.watermark.create'), 'Add') }}</li>
        </ul>

        <h1>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }}</h1>

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

        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </body>
</html>
