@extends('system.templates.layout')

@section('ph-icon') <img src="{{ asset('images/font-awesome/users-solid.svg') }}" > @endsection
@section('ph-main') @isset($create) {{ __('Unos korisnika') }} @else {{ $user->name ?? '' }} @endif @endsection
@section('ph-short')
    @isset($create)
        {{__('Unesite osnovne informacije za novog korisnika')}}
    @else
        {{__('Pregledajte / Uredite osnovne informacije za ')}} {{ $user->name ?? '' }}
        | <a href="{{ route('system.users.edit-user', ['username' => $user->username]) }}">{{{ __('Uredite') }}}</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{ route('system.users.all-users') }}">{{__('Svi korisnici')}}</a>
    @if(isset($create))
        / <a href="#">{{ __('Unos korisnika') }}</a>
    @else
        / <a href="{{ route('system.users.preview-user', ['username' => $user->username ]) }}">{{ $user->name ?? '' }}</a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper @if(isset($profile)) p-0 border-none @else p-3 @endif">
        <div class="row">
            <div class="col-md-12">
                @if(isset($create))
                    {!! Form::open(array('route' => 'system.users.save-user', 'method' => 'post', 'id' => 'js-form')) !!}
                @elseif(isset($edit))
                    {!! Form::open(array('route' => 'system.users.update-user-data', 'method' => 'put', 'id' => 'js-form')) !!}
                    {!! Form::hidden('id', $user->id, ['class' => 'form-control', 'id' => 'id']) !!}
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name"> <b>{{ __('Ime i prezime') }}</b> </label>
                                    {!! Form::text('name', $user->name ?? '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'nameHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="nameHelp" class="form-text text-muted"> {{ __('Puno ime i prezime') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"> <b>{{ __('Email') }}</b> </label>
                                    {!! Form::email('email', $user->email ?? '', ['class' => 'form-control required', 'id' => 'email', 'aria-describedby' => 'emailHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="emailHelp" class="form-text text-muted"> {{ __('Adresa e-Pošte') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username"> <b>{{ __('Korisničko ime') }}</b> </label>
                                    {!! Form::text('username', $user->username ?? '', ['class' => 'form-control required', 'id' => 'username', 'aria-describedby' => 'usernameHelp', (isset($preview) or isset($edit)) ? 'readonly' : '']) !!}
                                    <small id="usernameHelp" class="form-text text-muted"> {{ __('Korisničko ime') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="c-bootstrap-field">
                                    <label for="prefix"> <b>{{ __('Broj telefona') }}</b> </label>
                                    <div class="input-elements d-flex">
                                        {!! Form::select('prefix', $codes, $user->prefix ?? '', ['class' => 'form-control', 'id' => 'prefix', 'aria-describedby' => 'prefixHelp', 'style' => 'width:80px; margin-right:10px;', isset($preview) ? 'disabled => true' : '']) !!}

                                        {!! Form::number('phone', $user->phone ?? '', ['class' => 'form-control required', 'id' => 'phone', 'aria-describedby' => 'phoneHelp', 'maxlength' => '13', isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                    <small id="prefixHelp" class="form-text text-muted"> {{ __('Broj telefona sa kodom države') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address"><b>{{ __('Adresa stanovanja') }}</b></label>
                                    {!! Form::text('address', $user->address ?? '', ['class' => 'form-control required', 'id' => 'address', 'aria-describedby' => 'addressHelp', 'maxlength' => '50', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="addressHelp" class="form-text text-muted">{{ __('Trenutna adresa stanovanja') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"><b>{{ __('Grad') }}</b></label>
                                    {!! Form::text('city', $user->city ?? '', ['class' => 'form-control required', 'id' => 'city', 'aria-describedby' => 'cityHelp', 'maxlength' => '10', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="cityHelp" class="form-text text-muted">{{ __('Grad u kojem trenutno živi') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country"> <b>{{ __('Država') }}</b> </label>
                                    {!! Form::select('country', $countries, $user->country ?? '', ['class' => 'form-control select-2 required', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'style' => 'width:100%;', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="countryHelp" class="form-text text-muted"> {{ __('Državu u kojoj trenutno živi') }} </small>
                                </div>
                            </div>
                        </div>

                        @if(!isset($preview))
                            <div class="row mt-3 mb-4">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
