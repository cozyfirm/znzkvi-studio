@extends('system.templates.layout')

@section('ph-icon') <img src="{{ asset('images/font-awesome/users-solid.svg') }}" > @endsection
@section('ph-main') @isset($create) {{ __('Unos korisnika') }} @else {{ $user->name ?? '' }} @endif @endsection
@section('ph-short')
    @isset($create)
        {{__('Unesite osnovne informacije za novog korisnika')}}
    @else
        {{__('Pregledajte / Uredite osnovne informacije za ')}} {{ $user->name ?? '' }}
{{--        | <a href="{{ route('system.users.edit-user', ['username' => $user->username ?? '']) }}">{{{ __('Uredite') }}}</a>--}}
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{ route('system.users.all-users') }}">{{__('Svi korisnici')}}</a>
    @if(isset($create))
        / <a href="#">{{ __('Unos korisnika') }}</a>
    @else
{{--        / <a href="{{ route('system.users.preview-user', ['username' => $user->username ]) }}">{{ $user->name ?? '' }}</a>--}}
    @endif
@endsection

@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($create))
                    {!! Form::open(array('route' => 'system.sponsors.save', 'method' => 'post', 'files'=>'true')) !!}
                @elseif(isset($edit))

                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name"> <b>{{ __('Naziv') }}</b> </label>
                                    {!! Form::text('title', '', ['class' => 'form-control mt-2', 'required' => 'required', 'id' => 'title', 'aria-describedby' => 'titleHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="nameHelp" class="form-text text-muted"> {{ __('Npr. Otvorene Linije: EON') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="elem_name"> <b>{{ __('ID Elementa') }}</b> </label>
                                    {!! Form::text('elem_name', '', ['class' => 'form-control mt-2', 'required' => 'required', 'id' => 'elem_name', 'aria-describedby' => 'elem_nameHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="elem_nameHelp" class="form-text text-muted"> {{ __('ID Elementa iz SVG-a: open-lines-eon') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category"> <b>{{ __('Kategorija') }}</b> </label>
                                    {!! Form::select('category', ['category' => 'Kategorija', 'open-lines' => 'Otvorene linije'], '', ['class' => 'form-control mt-2', 'required' => 'required', 'id' => 'category', 'aria-describedby' => 'categoryHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="categoryHelp" class="form-text text-muted"> {{ __('Da li se prikazuje na otvorenim linijama ili kategoriji') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data"> <b>{{ __('SVG Sadržaj') }}</b> </label>
                                    {!! Form::textarea('data', '', ['class' => 'form-control mt-2', 'required' => 'required', 'id' => 'data', 'aria-describedby' => 'dataHelp', isset($preview) ? 'readonly' : '', 'style' => 'height:160px']) !!}
                                    <small id="dataHelp" class="form-text text-muted"> {{ __('Sadržaj SVG-a') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">{{ __('Zvučni efekat') }}</label>
                                <input class="form-control" type="file" id="file" name="file">
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
