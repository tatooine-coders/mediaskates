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

        <title>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }} :: {{ config('app.name') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- CSS reset and simple style -->
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <link rel="stylesheet" href="{{ url('css/jeremTemp.css') }}">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section id="enteteBarre">

            <div id="logo">
                <img src="{{ asset('images/sources/ms_horizontal_300.png') }}" alt>
            </div >

            <div id="nav">

                <ul class="menu">
                    <li>{{ link_to('/', 'Home') }}</li>
                    <li>{{ link_to(route('event.index'), 'Events') }}</li>
                    <li>{{ link_to(route('photo.index'), 'Photos') }}</li>
                    <li>{{ link_to(route('tag.index'), 'Tags') }}</li>
                    <li>{{ link_to(route('user.index'), 'Photographs') }}</li>
                    <li>{{ link_to(route('advanced_search'), 'Advanced search') }}</li>
                    <li>{{ link_to(route('pages', 'legal'), 'Terms of service') }}</li>
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
                @role(('admin'))
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
                    <li>{{ link_to(route('admin.license.index'), 'Manage') }}</li>
                    <li>{{ link_to(route('admin.license.create'), 'Add') }}</li>
                    <li class="title">Roles</li>
                    <li>{{ link_to(route('admin.role.index'), 'Manage') }}</li>
                    <li>{{ link_to(route('admin.role.create'), 'Add') }}</li>
                    <li class="title">Tags</li>
                    <li>{{ link_to(route('admin.tag.index'), 'Manage') }}</li>
                    <li class="title">Users</li>
                    <li>{{ link_to(route('admin.user.index'), 'Manage') }}</li>
                    <li>{{ link_to(route('admin.user.create'), 'Add') }}</li>
                    <li class="title">Watermarks</li>
                    <li>{{ link_to(route('admin.watermark.index'), 'Manage') }}</li>
                    <li>{{ link_to(route('admin.watermark.create'), 'Add') }}</li>
                </ul>
                @endrole
            </div>       
            <div id="reseauxSociaux">
                <a href="https://www.facebook.com/mediaskates/"><img src="{{ asset('images/sources/facebook.svg') }}" alt="facebook" title="facebook"/></a>
                <a href="https://twitter.com/mediaskates"><img src="{{ asset('images/sources/twitter.svg') }}" alt="twitter" title="twitter"/></a>
                <a href="https://www.instagram.com/mediaskates/"><img src="{{ asset('images/sources/instagram.svg') }}" alt="Portrait" title="wwww.googleplus.com"/></a>
                <a href="https://www.youtube.com/user/rollerenligne"><img src="{{ asset('images/sources/youtube.svg') }}" alt="youtube" title=""/></a>
            </div>
        </section>
        <div class="bordure"></div>

        @yield('header')

        <h1>@yield('pageTitle'){{ isset($pageTitle) ? $pageTitle : '' }}</h1>

        <!-- Errors -->
        @if (count($errors) > 0)
        <ul>

            <?php foreach ($errors->all() as $error): ?>
                <li>{{ $error }}</li>
            <?php endforeach ?>

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
        <section id="banniereFooter">
            <div class="bordure"></div>
            <div id="liens">
                <a href="http://www.rollerenligne.com/"><img src="{{ asset('images/sources/logo_en-2000.png') }}" alt="Logo en" width="90%" title="www.rollerenligne.com"/></a>
                <a href="http://www.online-skating.com/"><img src="{{ asset('images/sources/logo_rel2000.png') }}" alt="Logo fr" width="90%" title="www.online-skating.com"/></a>
                <a href="http://www.rollerenlinea.com/"><img src="{{ asset('images/sources/logo_es-2000.png') }}" alt="logo es" width="90%" title="www.rollerenlinea.com"/></a>
                <a href="http://www.onlineskaten.de/"><img src="{{ asset('images/sources/logo_de-2000.png') }}" alt="logo de" width="90%" title="www.onlineskaten.de"/></a>
                <a href="http://www.spotland.fr"><img src="{{ asset('images/sources/logo_spotland 2000.png') }}" alt="d" width="75%" title="www.spotland.fr"/></a>
                <a href="http://www.occasionroller.com"><img src="{{ asset('images/sources/logo_or2000.png') }}"alt="" width="93%" title="www.occasionroller.com"/></a>
            </div>

        </section>

        <footer>
            <br>
            <div id="utilisation">
                <h2>Utilisation des clichés du site</h2>
                <a href="">Formulaire de demande<br /></a>
                <a href="">Tarifs 2016<br /></a>
                <a href="">Conditions d’utilisation des photos à destionation des particuliers<br /></a>
                <a href="">Conditions d’utilisation des photos à destination des professionnels<br /></a>
                <a href="">Connexion à l’espace personnel</a></P>
            </div>

            <div id="mediaskates">
                <h2>MediaSkates.com</h2>
                <a href="">L’équipe du site<br /></a>
                <a href="">Rejoindre l’équipe du site<br /></a>
                <a href="">L’association Rollerenligne.com</a>
            </div>

            <div id="information">
                <h2>Information légales</h2>    
                <a href="">Mentions légales<br /></a>
                <a href="">Conditions générales</a>
            </div>
        </footer>
    </body>
</html>
