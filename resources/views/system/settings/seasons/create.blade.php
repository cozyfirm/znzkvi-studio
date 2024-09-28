@extends('system.templates.layout')

@section('ph-icon') <img src="{{ asset('images/font-awesome/calendar-regular.svg') }}" alt=""> @endsection
@section('ph-main') @isset($create) {{ __('Nova epizoda') }} @else {{ __('Pregled epizode') }} @endif @endsection
@section('ph-short')
    {{__('Pregledajte / Uredite epizode prikazane na FTV-u!')}}

    @isset($edit)
        | <a href="{{ route('system.settings.seasons.delete', ['id' => $episode->id]) }}">{{{ __('Obrišite') }}}</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{ route('system.settings.seasons') }}"> {{ __('Epizode') }} </a>
    @if(isset($create))
        / <a href="#">{{ __('Nova epizoda') }}</a>
    @else
        / <a href="#">{{ __('Pregled epizode') }}</a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="season_id"> <b>{{ __('Sezona') }}</b> </label>
                                    {!! Form::select('season_id', $seasons, isset($episode) ? $episode->season_id : (isset($active) ? $active->id : '') , ['class' => 'form-control required', 'id' => 'season_id', 'aria-describedby' => 'season_idHelp', isset($preview) ? 'disabled => true' : '', 'maxlength' => '200']) !!}
                                    <small id="season_idHelp" class="form-text text-muted"> {{ __('Odaberite sezonu kviza') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="episode"> <b>{{ __('Epizoda') }}</b> </label>
                                    {!! Form::number('episode', isset($episode) ? $episode->episode : (isset($next) ? $next : '1'), ['class' => 'form-control required', 'id' => 'episode', 'aria-describedby' => 'episodeHelp', isset($preview) ? 'readonly' : '', 'min' => '1', 'max' => '100', 'step' => '1']) !!}
                                    <small id="episodeHelp" class="form-text text-muted"> {{ __('Odaberite epizodu kviza') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date"> <b>{{ __('Datum epizode') }}</b> </label>
                                    {!! Form::text('date', isset($episode) ? $episode->date() : date('d.m.Y') , ['class' => isset($preview) ? 'form-control' : 'form-control required datepicker', 'id' => 'date', 'aria-describedby' => 'dateHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '10']) !!}
                                    <small id="dateHelp" class="form-text text-muted"> {{ __('Unesite datum održavanja epizode') }} </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
