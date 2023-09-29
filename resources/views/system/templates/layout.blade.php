<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="bs" > <!-- oncontextmenu="return false" -->
<head>
    <title> {{ __('ZNZKVI') }} </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo_black.png')}}"/>

    <!-- Stylesheet -->
    <link href="{{ asset('external-css/jquery-ui.css') }}" rel="Stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/system/system.css')}}">
    <link href="{{ asset('external-css/google-api-nunito.css') }}" rel="stylesheet">
    <script src="{{ asset('external-js/fontawesome.js') }}"></script>
    {{--<script src="https://kit.fontawesome.com/024a995986.js" crossorigin="anonymous"></script>--}}

    <!-- Javascript scripts -->
    <script src="{{asset('js/system.js')}}"></script>
    <script src="{{ asset('external-js/bootstrap.min.js') }}"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="{{asset('js/pusher/base.js')}}"></script>--}}
</head>
<body>

<div id="main-div"></div>

<!-- Import MENU -->
@include("system.templates.menu.menu")
@include('system.templates.snippets.pop-up')

<div class="main-content">
    <!-- Basic header of every page -->
    @include("system.templates.page-header")

    <!-- Main content of every page -->
    @yield('content')
</div>

</body>
</html>
