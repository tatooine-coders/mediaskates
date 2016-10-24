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
        <link rel="stylesheet" href="{{ url('css/style2.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/vendor/jquery.min.js')}}"></script>
        <script src="{{ asset('js/vendor/freewall.js')}}"></script>
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
            <!-- Menu -->
            <div id="nav">
                <ul id="nav2">
                    <li>{{ link_to('/', 'Accueil') }}</li>
                    <li>{{ link_to(route('event.index'), 'Manifestations') }}</li>
                    <li>{{ link_to(route('photo.index'), 'Photos') }}</li>
                    <li>{{ link_to(route('tag.index'), 'Tags') }}</li>
                    <li>{{ link_to(route('user.index'), 'Photographes') }}</li>
                    <li>{{ link_to(route('advanced_search'), 'Recherche Avancée') }}</li>
                    <li>{{ link_to(route('pages', 'legal'), 'Mentions Légales') }}</li>
                </ul>
                <div class="login">       
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Connexion</a></li>
                    <li><a href="{{ url('/register') }}">Inscription</a></li>

                    @else
                    <li>User {{ Auth::user()->pseudo }}</li>
                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </div>

                <div class="user">
                    <!-- Membre -->
                    @role(('member'))
                    <ul class="menu">
                        <li>Utilisateurs
                            <ul>
                                <li>Commentaires
                                    <ul>
                                        <li>{{ link_to(route('user.comment.index'), 'Gérer') }}</li>
                                    </ul>
                                </li>
                                <li>utilisateur
                                    <ul>
                                        <li>{{ link_to(route('user.dashboard'), 'Tableau de Bord') }}</li>
                                        <li>{{ link_to(route('user.preferences'), 'Préférences') }}</li>
                                        <li>{{ link_to(route('user.personnal_infos'), 'Profil') }}</li>
                                        <li>{{ link_to(route('user.update_passwd'), 'Changer le mot de passe') }}</li>
                                        <li>{{ link_to(route('user.logout'), 'Déconnexion') }}</li>
                                        <li>{{ link_to(route('user.close_account'), 'Fremer mon Compte') }}</li>
                                    </ul>
                                </li>
                                <li>Tags
                                    <ul>
                                        <li>{{ link_to(route('user.tag.index'), 'Gérer') }}</li>
                                    </ul>
                                </li>
                                <li>Votes
                                    <ul>
                                        <li>{{ link_to(route('user.vote.index'), 'Gérer') }}</li>
                                    </ul>
                                </li>
                                @role(('photograph'))
                                <li>Photograph</li>
                                <li>Manifestations
                                    <ul>
                                        <li>{{ link_to(route('user.event.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('user.event.create'), 'Ajouter') }}</li>
                                    </ul>
                                </li>
                                <li>Photos
                                    <ul>
                                        <li>{{ link_to(route('user.photo.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('user.photo.create'), 'Ajouter') }}</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>    
                        @endrole
                        @endrole    
                    </ul>
                </div>
                <!-- Admin -->
                <div class="admin"> @role(('admin'))
                    <ul class="menu">
                        <li>Administrateur
                            <ul>
                                <li>Commentaires
                                    <ul>
                                        <li>{{ link_to(route('admin.comment.index'), 'Gérer') }}</li>
                                    </ul>
                                </li>
                                <li>Disciplines
                                    <ul>
                                        <li>{{ link_to(route('admin.discipline.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('admin.discipline.create'), 'Ajouter') }}</li>
                                    </ul></li>
                                <li>Manifestations
                                    <ul>
                                        <li>{{ link_to(route('admin.event.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('admin.event.create'), 'Ajouter') }}</li>
                                    </ul></li>
                                <li>Licenses
                                    <ul>       
                                        <li>{{ link_to(route('admin.license.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('admin.license.create'), 'Ajouter') }}</li>
                                    </ul></li>       
                                <li>Roles
                                    <ul>
                                        <li>{{ link_to(route('admin.role.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('admin.role.create'), 'Ajourter') }}</li>
                                    </ul></li>       
                                <li>Tags
                                    <ul>        
                                        <li>{{ link_to(route('admin.tag.index'), 'Gérer') }}</li>
                                    </ul></li>        
                                <li>Utilisateurs
                                    <ul>
                                        <li>{{ link_to(route('admin.user.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('admin.user.create'), 'Ajouter') }}</li>
                                    </ul></li>           
                                <li>Watermarks
                                    <ul>
                                        <li>{{ link_to(route('admin.watermark.index'), 'Gérer') }}</li>
                                        <li>{{ link_to(route('admin.watermark.create'), 'Ajouter') }}</li>
                                    </ul></li>        
                            </ul>   
                        </li>    
                    </ul>
                    @endrole
                </div>
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
