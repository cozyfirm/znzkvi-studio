<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title> {{ __('Prijavite se') }} </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/LogoMali.png') }}"/>

    <!-- CSS files + fonts -->
    <script src="https://kit.fontawesome.com/bccf934f7c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/system/system.css') }}">

    <!-- JavaScript files -->
    <script src="{{asset('js/system.js')}}"></script>
</head>
<body>
<div class="loading-gif d-none">
    <img src="{{ asset('images/loading.gif') }}" alt="">
</div>
<div class="register-form">
    <div class="rf-image">
        <img src="{{asset('images/logo-rotated.png')}}" alt="">
    </div>
    <div class="rf-form">
        <div class="center-element">
            <div class="rf-f-header">
                <h2 class="tb-color mb-4"> <b>{{ __('Kreirajte svoj profil') }}</b> </h2>
                <p>
                    {{ __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book") }}
                </p>
            </div>

            <hr>

            <div class="rf-f-body">
                {!! Form::open(array('route' => 'system.auth.create-new-profile', 'method' => 'post', 'id' => 'js-form')) !!}
                <div class="rf-body-element rf-body-element-1 ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name"><b>{{ __('Ime i prezime') }}</b></label>
                                {!! Form::text('name', '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'nameHelp', 'maxlength' => '50']) !!}
                                <small id="nameHelp" class="form-text text-muted">{{ __('Unesite Vaše ime prezime') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"><b>{{ __('Email adresa') }}</b></label>
                                {!! Form::text('email', '', ['class' => 'form-control required email', 'id' => 'email', 'aria-describedby' => 'emailHelp', 'maxlength' => '50']) !!}
                                <small id="emailHelp" class="form-text text-muted">{{ __('Unesite Vašu email adresu') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password"><b>{{ __('Vaša šifra') }}</b></label>
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'aria-describedby' => 'passwordHelp', 'maxlength' => '50']) !!}
                                <small id="passwordHelp" class="form-text text-muted">{{ __('Unesite željenu pristupnu šifru') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username"><b>{{ __('Korisničko ime') }}</b></label>
                                {!! Form::text('username', '', ['class' => 'form-control required', 'id' => 'username', 'aria-describedby' => 'usernameHelp', 'maxlength' => '20']) !!}
                                <small id="usernameHelp" class="form-text text-muted">{{ __('Unesite Vaše korisničko ime') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="c-bootstrap-field">
                                <label for="prefix"> <b>{{ __('Broj telefona') }}</b> </label>
                                <div class="input-elements">
                                    {!! Form::select('prefix', $phone_prefixes, '+387', ['class' => 'form-control', 'id' => 'prefix', 'aria-describedby' => 'prefixHelp', 'style' => 'width:80px; margin-right:10px;']) !!}

                                    {!! Form::number('phone', '', ['class' => 'form-control required', 'id' => 'phone', 'aria-describedby' => 'phoneHelp', 'maxlength' => '13']) !!}
                                </div>
                                <small id="prefixHelp" class="form-text text-muted"> {{ __('Unesite Vaš broj telefona') }} </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Adresa stanovanja') }}</b></label>
                                {!! Form::text('address', '', ['class' => 'form-control required', 'id' => 'address', 'aria-describedby' => 'addressHelp', 'maxlength' => '50']) !!}
                                <small id="addressHelp" class="form-text text-muted">{{ __('Vaša trenutna adresa stanovanja') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city"><b>{{ __('Grad') }}</b></label>
                                {!! Form::text('city', '', ['class' => 'form-control required', 'id' => 'city', 'aria-describedby' => 'cityHelp', 'maxlength' => '10']) !!}
                                <small id="cityHelp" class="form-text text-muted">{{ __('Grad u kojem trenutno živite') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country"> <b>{{ __('Država') }}</b> </label>
                                {!! Form::select('country', $countries, '', ['class' => 'form-control select-2 required', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'style' => 'width:100%;']) !!}
                                <small id="countryHelp" class="form-text text-muted"> {{ __('Odaberite državu u kojoj trenutno živite') }} </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 mb-4">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn btn-dark">{{__('Kreirajte profil')}}</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ __('Imate kreiran profil?') }} <a href="{{ route('system.auth') }}"><b>{{ __('Prijavite se') }}</b></a>
                    </div>
                </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
</div>
</body>
</html>
