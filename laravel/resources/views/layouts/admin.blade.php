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

        <title>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }} :: ADMIN :: {{ config('app.name') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- CSS reset and simple style -->
        <link rel="stylesheet" href="{{ url('css/admin.css') }}">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>
    <body>
        <!-- Main menu -->
        <nav class="menu">
            <span>{{ link_to('/', config('app.name')) }}</span>
            <span><i class="fa fa-fw fa-home"></i> {{ link_to('/', 'Home') }}</span>
            <span><i class="fa fa-fw fa-calendar"></i> {{ link_to(route('event.index'), 'Events') }}</span>
            <span><i class="fa fa-fw fa-photo"></i> {{ link_to(route('photo.index'), 'Photos') }}</span>
            <span><i class="fa fa-fw fa-users"></i> {{ link_to(route('user.index'), 'Photographs') }}</span>
            <span><i class="fa fa-fw fa-search"></i> {{ link_to(route('advanced_search'), 'Advanced search') }}</span>
            <span><i class="fa fa-fw fa-chevron-right"></i></span>
            <span><i class="fa fa-fw fa-sign-out"></i> <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></span>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            <span><i class="fa fa-fw fa-dashboard"></i> <a href="{{ route('user.dashboard') }}">Personnal dashboard</a></span>
        </nav>
        <!-- /Main menu -->

        <!-- Container for the page -->
        <div id="main" role="main" class="flex-container">
            <!-- Side menu -->
            <div class="w20 menu">
                <nav id="navigation" role="navigation">

                    @include('elements/menus/admin')

                </nav>
            </div>
            <!-- /Side menu -->

            <!-- Page content -->
            <div class="flex-item-fluid">
                <!--[if lt IE 8]>
                    <p class="warning">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
                <![endif]-->
                <header id="header" role="banner" class="menu">
                    <h1><small>@yield('sectionLinks')</small>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }}</h1>
                </header>

                <!-- Infos -->
                @if(Session::has('message'))
                <div class="page-wrapper alert-info">
                  <div class="content">
                    <i class="fa fa-info-circle"></i> {{ session('message') }}
                  </div>
                </div>
                @endif
                <!-- /Infos -->

                <!-- Errors -->
                @if (count($errors) > 0)
                  <div class="page-wrapper alert-error">
                    <div class="content">
                      <i class="fa fa-exclamation-triangle"></i> Des erreurs on été rencontrées :
                      <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                          <li>- {{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                @endif
                <!-- /Errors -->

                <!-- Content -->
                @yield('content')
                <!-- /Content -->

            </div>
            <!-- /Page content -->

        </div>
        <!-- /Container for the page -->

        <!-- Page footer -->
        <footer id="footer" role="contentinfo" class="menu">
            <ul>
                <li>{{ link_to(route('pages', 'legal'), 'Terms of service') }}</li>
            </ul>
        </footer>
        <!-- /Page footer -->

        <!-- Additionnal scripts -->
        <script src="{{ url('js/vendor/jquery.min.js') }}"></script>
    </body>
</html>
