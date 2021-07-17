<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | SMIT</title>

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/png">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    
    <div class="main">

        <div class="text-center">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('assets/images/logo.png')}}" alt="Logo">
            </a>
        </div>

        @yield('content')

    </div>

    
    <!-- JS -->
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>
