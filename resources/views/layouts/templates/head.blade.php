<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--google analisis-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111708594-1"></script>
        <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-111708594-1');
        </script>
        <!--fin google analisis-->
        <!--comentarios og-->
        <meta property="og:type" content="article" />
    
        <meta property="og:title" content="Principal" />
    
        <meta property="og:url" content="" />
    
        <meta property="og:image" content="{{asset('img/img_site/home_url.jpg')}}" />
    
        <meta property="og:description" content="" />
    
        <meta property="og:site_name" content="" />
    
        <meta property="og:locale" content="es_AR" />
    
        <meta property="og:locale:alternate" content="en_UK" />
        <!--fin comentarios og-->
    
        <!-- <title>Tutoriales de Sistemas</title> -->
    
    
        <title>{{ config('app.name', 'Home') }}</title>
            
    
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/botones_menu.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/avatar.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/css_imagen.css')}}">
            <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png')}}"/>
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
            <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">  -->
            <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/gradientes.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/css_footer.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/style_menusnew.css')}}">
            
            
    
            
    <style>
    .navbar-brand {
    font-family: "lato" !important;
    font-weight: 700 !important;
    text-transform: uppercase;
    font-size: 1.9em;
    color: #393939;
    }
    </style>
            
    
    </head> 