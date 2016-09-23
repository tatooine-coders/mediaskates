<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ isset($pageTitle) ? $pageTitle : 'Une page...' }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <ul id="menu" style="list-style-type: none; border-bottom:1px solid #333; padding: 5px 0; font-size:0.8em">
            <li style="display: inline; padding-right: 10px;">{{ link_to('/', 'Accueil') }}</li>
            <li style="display: inline; padding-right: 10px; border-left:3px solid #333; padding-left:3px;">Users</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/users/add', 'Add') }}</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/users', 'Index') }}</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/users/register', 'Register') }}</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/users/login', 'Login') }}</li>
            <li style="display: inline; padding-right: 10px; border-left:3px solid #333; padding-left:3px;">Photos</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/photos/add', 'Add') }}</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/photos/index', 'Index') }}</li>
            <li style="display: inline; padding-right: 10px; border-left:3px solid #333; padding-left:3px;">Roles</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/roles/add', 'Add') }}</li>
            <li style="display: inline; padding-right: 10px;">{{ link_to('/roles/index', 'Index') }}</li>

        </ul>

        <h1>{{ isset($pageTitle) ? $pageTitle : 'Une page...' }}</h1>

        <div id="content">
            @yield('content')
        </div>

        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </body>
</html>
