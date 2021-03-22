<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="description" content="@yield("description")"/>
    <meta name="keywords" content="@yield("keywords")"/>
    <meta name="author" content="Dušan Vesić"/>
    <title>@yield("title")</title>
    <link rel="shortcut icon" href="{{ asset("assets/img/favicon.ico") }}" type="image/x-icon"/>

    <link href="{{ asset("assets/css/animate.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("assets/css/bootstrap.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("assets/css/menu.css") }}" rel="stylesheet"/>
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/responsive.css") }}" rel="stylesheet"/>
    <link href="{{ asset("assets/css/elegant_font/elegant_font.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("assets/css/magnific-popup.css") }}" rel="stylesheet"/>
    <link href="{{ asset("assets/css/pop_up.css") }}" rel="stylesheet"/>

    @yield('css')
</head>

<body>

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave" id="status">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>



@yield("header")

@yield("slider")

@yield("content")

@yield("footer")

@if(!session()->has('user'))
    @include('shared.fixed.forms')
@endif

@if(session()->has('emptyCart')) <script> localStorage.clear(); </script>@endif
<script src="{{ asset("assets/js/jquery-3.5.1.min.js") }}"></script>
<script src="{{ asset("assets/js/common_scripts_min.js") }}"></script>
<script src="{{ asset("assets/js/functions.js") }}"></script>
<script src="{{ asset("assets/js/fontawesome.min.js") }}"></script>

@yield("scripts")

</body>

</html>
