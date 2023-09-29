@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="h-img" src="{{ asset('images/font-awesome/play-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Sinhronizacija seta') }} @endsection
@section('ph-short') {{__('Sinhronizirajte setove pitanja sa centralnim sistemom za željeni datu,')}} @endsection

@section('ph-navigation')
    / <a href="{{ route('system.quiz') }}"> {{ __('Pregled setova') }} </a>
    / <a href="#"> {{ __('Sinhronizacija setova') }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <div class="row">
            <div class="@if(isset($preview)) col-md-9 @else col-md-12 @endif">
                {!! Form::open(array('route' => 'system.quiz.sync-quizzes-from-center', 'method' => 'post', 'id' => 'js-form')) !!}

                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date"> <b>{{ __('Datum održavanja') }}</b> </label>
                                    {!! Form::text('date', date('d.m.Y'), ['class' => isset($preview) ? 'form-control mt-1' : 'form-control datepicker mt-1', 'id' => 'date', 'aria-describedby' => 'dateHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '10', 'minlength' => '10']) !!}
                                    <small id="dateHelp" class="form-text text-muted"> {{ __('Unesite datum kada se kviz održava') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
