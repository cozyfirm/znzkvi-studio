<html>
<head>
    <title> {{ __('ZNZKVI TV') }} </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo_black.png')}}"/>

    <link rel="stylesheet" href="{{asset('css/public/public.css')}}">
</head>
<body>
    <div class="main__frame">
        <div class="image__part">
            <img src="{{ asset('images/znzkvi-brain.png') }}" alt="">
        </div>
        <div class="text__part">
            <div class="text__wrapper">
{{--                <img src="{{ asset('images/znzkvi.png') }}" alt="">--}}

                <h1>{{ __('ZNZKVI TV') }}</h1>
                <h2>{{ __('TV verzija ZNZKVI !!  Odaberite neku od ponudenih opcija za nastavak: ') }}</h2>

                <div class="buttons__w">
                    <a href="{{ route('system.users.my-profile') }}">
                        <button class="button">
                            <img src="{{ asset('images/svgs/login.png') }}" alt="">
                            {{ __('Prijavi se') }}
                        </button>
                    </a>
                    <a href="{{ route('public-part.quiz.presenter-view') }}">
                        <button class="button">
                            <img src="{{ asset('images/font-awesome/users-solid.svg') }}" alt="">
                            {{ __('Voditelj kviza') }}
                        </button>
                    </a>
                    <a href="{{ route('public-part.quiz.studio-quiz') }}">
                        <button class="button blue-btn">
                            <img src="{{ asset('images/svgs/tv.png') }}" alt="">
                            {{ __('TV Prijenos') }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
