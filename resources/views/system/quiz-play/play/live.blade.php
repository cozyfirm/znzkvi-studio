@extends('system.templates.layout')

@section('ph-icon') <img src="{{ asset('images/font-awesome/heart-pulse-solid.svg') }}" title="{{ __('Link aktivan sa aplikativnim dijelom!') }}"> @endsection
@section('ph-main')  {{ __('Live feed') }} @endsection
@section('ph-short') {{__('Live feed kviza. Pregled informacije o kvizu uživo - Kontrolni centar za igranje kviza.')}} @endsection

@section('ph-navigation')
    / <a href="#">{{__('Kviz')}}</a>
    / <a href="#">{{ __('Live feed') }}</a>
@endsection

@section('content')
    <!-- Import script for live quiz handling -->
{{--    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>--}}

    <script src="{{asset('js/live.js')}}"></script>

    <div class="content-wrapper content-wrapper-bs">
        <!-- Live quiz header information -->
        @include('system.quiz-play.snippets.live-header')
        <!-- Pop-Up for "Are you sure that you wanna click that .. ? -->
        @include('system.quiz-play.snippets.are-you-sure')

        <hr>

        <div class="row">
            <div class="col-md-8">
                <div class="reveal-the-question">
                    <img src="{{ asset('images/font-awesome/circle-play-regular.svg') }}" alt="" title="{{ __('Započnite kviz. Otvorite prvo pitanje!') }}">
                </div>

                {!! Form::open(array('route' => 'system.quiz-play.users.save', 'method' => 'post', 'id' => 'js-form')) !!}

                    {!! Form::hidden('quiz_id', $quiz->id, ['class' => 'form-control', 'id' => 'quiz_id']) !!}
                    {!! Form::hidden('question_id', $question->id ?? '', ['class' => 'form-control', 'id' => 'question_id']) !!}
                    {!! Form::hidden('joker', $joker ?? '', ['class' => 'form-control', 'id' => 'joker']) !!}

                    <div class="row regular-question @if($additional) d-none @endif">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::textarea('question', $question->question ?? '', ['class' => 'form-control required', 'id' => 'question', 'aria-describedby' => 'questionHelp', 'readonly', 'style' => 'height:120px; resize:none;']) !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Regular answers -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend"> <div class="input-group-text"> <b class="answer_l answer_a_l @if($question->answerARel->correct) t-green @endif">1</b> </div> </div>
                                        {!! Form::text('answer_a', $question->answerARel->answer ?? '', ['class' => 'form-control answer-it o-none c-pointer', 'id' => 'answer_a', 'readonly', 'letter' => 'A', 'gui_letter' => '1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend"> <div class="input-group-text"> <b class="answer_l answer_b_l @if($question->answerBRel->correct) t-green @endif">2</b> </div> </div>
                                        {!! Form::text('answer_b', $question->answerBRel->answer ?? '', ['class' => 'form-control answer-it o-none c-pointer', 'id' => 'answer_b', 'readonly', 'letter' => 'B', 'gui_letter' => '2']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend"> <div class="input-group-text"> <b class="answer_l answer_c_l @if($question->answerCRel->correct) t-green @endif">3</b> </div> </div>
                                        {!! Form::text('answer_c', $question->answerCRel->answer ?? '', ['class' => 'form-control answer-it o-none c-pointer', 'id' => 'answer_c', 'readonly', 'letter' => 'C', 'gui_letter' => '3']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend"> <div class="input-group-text"> <b class="answer_l answer_d_l @if($question->answerDRel->correct) t-green @endif">4</b> </div> </div>
                                        {!! Form::text('answer_d', $question->answerDRel->answer ?? '', ['class' => 'form-control answer-it o-none c-pointer', 'id' => 'answer_d', 'readonly', 'letter' => 'D', 'gui_letter' => '4']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aditional question -->
                    <div class="row additional-question @if(!$additional) d-none @endif">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::textarea('additional_questions', $question->additional_questions ?? '', ['class' => 'form-control required', 'id' => 'additional_questions', 'aria-describedby' => 'questionHelp', 'readonly', 'style' => 'height:120px; resize:none;']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="input-group mb-2">
                                        {!! Form::text('additional_q_answer', $question->additional_q_answer ?? '', ['class' => 'form-control o-none c-pointer', 'id' => 'additional_q_answer', 'readonly']) !!}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend"> <div class="input-group-text"> <b class="t-green"> <img class="button-images" src="{{ asset('images/font-awesome/check-solid.svg') }}" alt=""> </b> </div> </div>
                                        {!! Form::text('correct_answer', 'Tačan odgovor', ['class' => 'form-control answer-additional o-none c-pointer', 'id' => 'correct_answer', 'readonly', 'correct' => 'Yes', 'gui_correct' => 'Da']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend"> <div class="input-group-text"> <b> <img class="button-images" src="{{ asset('images/font-awesome/times-red-solid.svg') }}" alt=""> </b> </div> </div>
                                        {!! Form::text('incorrect_answer', 'Netačan odgovor', ['class' => 'form-control answer-additional o-none c-pointer', 'id' => 'incorrect_answer', 'readonly', 'correct' => 'No', 'gui_correct' => 'Ne']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--<div class="row">--}}
                    {{--    <div class="col-md-12">--}}
                    {{--        <div class="row mt-3 mb-4">--}}
                    {{--            <div class="col-md-12 d-flex justify-content-end">--}}
                    {{--                <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Sljedeće pitanje')}}</b> </button>--}}
                    {{--            </div>--}}
                    {{--        </div>--}}
                    {{--    </div>--}}
                    {{--</div>--}}
                {!! Form::close(); !!}
            </div>
            @include('system.quiz-play.snippets.live-info')
        </div>
    </div>
@endsection
