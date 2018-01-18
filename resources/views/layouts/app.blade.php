<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link href = "{{ asset('css/app.css') }}" rel = "stylesheet">--}}
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
    <div id = "app">
        <div class = "top-bar">
            <div class = "top-bar-left">
                <ul class = "dropdown menu" data-dropdown-menu>
                    <li class = "menu-text">Vue Store</li>
                    {{--<li class="menu-text"><routes-link :to="{name:'home'}">News Sources </routes-link></li>--}}
                </ul>
            </div>
            <div class = "top-bar-right">
                <ul class = "menu dropdown" data-dropdown-menu>
                    <li><a href = "/"> <i class="fa fa-home"></i> Home</a></li>
                    <li><a href = "/"> <i class="fa fa-home"></i> About</a></li>
                    <li><a href = "/"> <i class="fa fa-envelope-o"></i> Contact</a></li>
                </ul>
            </div>
        </div>
        <home></home>
        {{--@yield('content')--}}
    </div>

    <!-- Scripts -->
    {{--<script src = "{{ asset('js/app.js') }}"></script>--}}
    <script src="/js/app.js"></script>
    <script> $(document).foundation();</script>
</body>
</html>
