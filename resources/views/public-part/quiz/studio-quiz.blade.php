<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{ __('Studio quiz') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo_black.png')}}"/>

    <!-- ToDo - Download all external files -->
    <!-- Stylesheet -->
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/system/system.css')}}">
    <link rel="stylesheet" href="{{asset('css/public/public.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>

    <!-- Javascript scripts -->
    <script src="external-js/mqtt.min.js"></script>

    <script src="{{asset('js/system.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('js/public.js')}}"></script>
</head>
<body>
    <!-- MQTT host and port data -->
    {!! Form::hidden('env_mqtt_host', env('MQTT_HOST'), ['id' => 'env_mqtt_host']) !!}
    {!! Form::hidden('env_mqtt_ws_port', env('MQTT_WS_PORT'), ['id' => 'env_mqtt_ws_port']) !!}
    <!-- Import script for live quiz handling -->
    <script src="{{asset('js/mqtt/tv-script.js')}}"></script>

    <!-- Require SVG file -->
    <div class="quiz-wrapper">
        @include('public-part.quiz.files.svg-file')
    </div>
</body>
</html>
