@extends('system.templates.layout')

@section('ph-icon') <img src="{{ asset('images/font-awesome/users-solid.svg') }}" > @endsection
@section('ph-main')  {{ __('Unos korisnika') }} @endsection
@section('ph-short') {{__('Unesite osnovne informacije za novog korisnika prije početka igre')}} @endsection

@section('ph-navigation')
    / <a href="#">{{__('Kviz')}}</a>
    / <a href="{{ route('system.quiz-play.users.create-user') }}">{{ __('Unos korisnika') }}</a>
@endsection

@section('content')
    <div class="content-wrapper p-3">
        @if(!$totalSets)
            <div class="alert alert-danger"> {{ __('Trenutno nema dostupan ni jedan set za igranje !') }} </div>
        @endif

        <div class="row">
            <div class="col-md-9">
                {!! Form::open(array('route' => 'system.quiz-play.users.save', 'method' => 'post', 'id' => 'js-form')) !!}

                <!-- Hidden attribute that represents chosen user id -->
                {!! Form::hidden('selected_user', '', ['class' => 'form-control', 'id' => 'selected_user']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name"> <b>{{ __('Ime') }}</b> </label>
                                    {!! Form::text('first_name', $user->first_name ?? '', ['class' => 'form-control required first_name', 'id' => 'first_name', 'aria-describedby' => 'first_nameHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="first_nameHelp" class="form-text text-muted"> {{ __('Ime korisnika') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name"> <b>{{ __('Prezimee') }}</b> </label>
                                    {!! Form::text('last_name', $user->last_name ?? '', ['class' => 'form-control required last_name', 'id' => 'search-by-lastname', 'aria-describedby' => 'last_nameHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="last_nameHelp" class="form-text text-muted"> {{ __('Prezime korisnika') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"> <b>{{ __('Email') }}</b> </label>
                                    {!! Form::email('email', $user->email ?? '', ['class' => 'form-control required email', 'id' => 'email', 'aria-describedby' => 'emailHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="emailHelp" class="form-text text-muted"> {{ __('Adresa e-Pošte') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username"> <b>{{ __('Korisničko ime') }}</b> </label>
                                    {!! Form::text('username', $user->username ?? '', ['class' => 'form-control required username', 'id' => 'username', 'aria-describedby' => 'usernameHelp', (isset($preview) or isset($edit)) ? 'readonly' : '']) !!}
                                    <small id="usernameHelp" class="form-text text-muted"> {{ __('Korisničko ime') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="c-bootstrap-field">
                                    <label for="prefix"> <b>{{ __('Broj telefona') }}</b> </label>
                                    <div class="input-elements d-flex">
                                        {!! Form::select('prefix', $codes, $user->prefix ?? '+387', ['class' => 'form-control prefix', 'id' => 'prefix', 'aria-describedby' => 'prefixHelp', 'style' => 'width:80px; margin-right:10px;', isset($preview) ? 'disabled => true' : '']) !!}

                                        {!! Form::number('phone', $user->phone ?? '', ['class' => 'form-control required phone', 'id' => 'phone', 'aria-describedby' => 'phoneHelp', 'maxlength' => '13', isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                    <small id="prefixHelp" class="form-text text-muted"> {{ __('Broj telefona sa kodom države') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address"><b>{{ __('Adresa stanovanja') }}</b></label>
                                    {!! Form::text('address', $user->address ?? '', ['class' => 'form-control required address', 'id' => 'address', 'aria-describedby' => 'addressHelp', 'maxlength' => '50', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="addressHelp" class="form-text text-muted">{{ __('Trenutna adresa stanovanja') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"><b>{{ __('Grad') }}</b></label>
                                    {!! Form::text('city', $user->city ?? '', ['class' => 'form-control required city', 'id' => 'city', 'aria-describedby' => 'cityHelp', 'maxlength' => '50', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="cityHelp" class="form-text text-muted">{{ __('Grad u kojem trenutno živi') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country"> <b>{{ __('Država') }}</b> </label>
                                    {!! Form::select('country', $countries, '21', ['class' => 'form-control required country', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'style' => 'width:100%;', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="countryHelp" class="form-text text-muted"> {{ __('Državu u kojoj trenutno živi') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-4">
                            <div class="col-md-12 d-flex justify-content-end gap-3">
                                <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close(); !!}
            </div>
            @include('system.quiz-play.snippets.init-data')
        </div>
    </div>
@endsection
