@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="h-img" src="{{ asset('images/font-awesome/play-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Demo version') }} @endsection
@section('ph-short') {{__('Demo verzija kviza - Test prikaza pitanja')}} @endsection

@section('ph-navigation')
    / <a href="#"> {{ __('Demo version') }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="question"> <b>{{ __('Željeno pitanje') }}</b> </label>
                            {!! Form::textarea('question', '', ['class' => 'form-control required mt-1', 'id' => 'question', 'aria-describedby' => 'questionHelp', 'maxlength' => '200', 'style' => 'height:64px']) !!}
                            <small id="questionHelp" class="form-text text-muted"> {{ __('Unesite željeno pitanje') }} </small>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"> <b>A</b> </div>
                                </div>
                                {!! Form::text('answer_a', '', ['class' => 'form-control', 'id' => 'answer_a', 'placeholder' => __('')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"> <b>B</b> </div>
                                </div>
                                {!! Form::text('answer_b','', ['class' => 'form-control', 'id' => 'answer_b', 'placeholder' => __('')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"> <b>C</b> </div>
                                </div>
                                {!! Form::text('answer_c', '', ['class' => 'form-control', 'id' => 'answer_c', 'placeholder' => __('')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"> <b>D</b> </div>
                                </div>
                                {!! Form::text('answer_d', '', ['class' => 'form-control', 'id' => 'answer_d', 'placeholder' => __('')]) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 mb-4">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-secondary send-demo-questions"> <b>{{__('Pošaljite pitanje')}}</b> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
