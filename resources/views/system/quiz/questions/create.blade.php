@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-question"></i> @endsection
@section('ph-main') @if(isset($create)) {{ __('Unos pitanja') }} @else {{ __('Pregled pitanja') }} @endif @endsection
@section('ph-short')
    {{__('Unos / pregled pitanja koja se nalaze na sistemu www.znzkvi.ba ')}}
    @if(isset($preview))
        | <a href="{{ route('system.quiz.questions.edit-question', ['id' => $question->id ]) }}">{{ __('Uredite pitanje') }}</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{ route('system.quiz.questions') }}"> {{ __('Pregled pitanja') }} </a>
    / <a href="#"> @if(isset($create)) {{ __('Unos pitanja') }} @else {{ __('Pitanje') }} @endif </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category"> <b>{{ __('Kategorija') }}</b> </label>
                                    {!! Form::select('category', $categories, $question->category ?? '', ['class' => 'form-control question-category required mt-1', 'id' => 'category', 'aria-describedby' => 'categoryHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="categoryHelp" class="form-text text-muted"> {{ __('Kategorija iz koje pitanje dolazi') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight"> <b>{{ __('Težina') }}</b> </label>
                                    {!! Form::select('weight', $weights, $question->weight ?? '', ['class' => 'form-control question-weight required mt-1', 'id' => 'weight', 'aria-describedby' => 'weightHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="weightHelp" class="form-text text-muted"> {{ __('Težina pitanja (od 1 do 7)') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question"> <b>{{ __('Željeno pitanje') }}</b> </label>
                                    {!! Form::textarea('question', $question->question ?? '', ['class' => 'form-control question-question required mt-1', 'id' => 'question', 'aria-describedby' => 'questionHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '200', 'style' => 'height:64px']) !!}
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
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center">
                                                @if(isset($create))
                                                    <i class="fas fa-check"></i>
                                                @else
                                                    <b class="@if($question->answerARel->correct) text-success @else text-danger @endif">A</b>
                                                @endif
                                            </div>
                                        </div>
                                        {!! Form::text('correct_answer', $question->answerARel->answer ?? '', ['class' => 'form-control question-correct-answer', 'id' => 'correct_answer', 'placeholder' => __('Tačan odgovor'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center">
                                                @if(isset($create))
                                                    <i class="fas fa-times"></i>
                                                @else
                                                    <b class="@if($question->answerBRel->correct) text-success @else text-danger @endif">B</b>
                                                @endif
                                            </div>
                                        </div>
                                        {!! Form::text('incorrect_one', $question->answerBRel->answer ?? '', ['class' => 'form-control', 'id' => 'incorrect_one', 'placeholder' => __('Ostali netačni odgovori ..'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center">
                                                @if(isset($create))
                                                    <i class="fas fa-times"></i>
                                                @else
                                                    <b class="@if($question->answerCRel->correct) text-success @else text-danger @endif">C</b>
                                                @endif
                                            </div>
                                        </div>
                                        {!! Form::text('incorrect_two', $question->answerCRel->answer ?? '', ['class' => 'form-control', 'id' => 'incorrect_two', 'placeholder' => __('Ostali netačni odgovori ..'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center">
                                                @if(isset($create))
                                                    <i class="fas fa-times"></i>
                                                @else
                                                    <b class="@if($question->answerDRel->correct) text-success @else text-danger @endif">D</b>
                                                @endif
                                            </div>
                                        </div>
                                        {!! Form::text('incorrect_three', $question->answerDRel->answer ?? '', ['class' => 'form-control', 'id' => 'incorrect_three', 'placeholder' => __('Ostali netačni odgovori ..'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row @if(isset($preview) and !isset($question->additional_questions)) d-none @endif direct-question">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_questions"> <b>{{ __('Direktno pitanje') }}</b> </label>
                                    {!! Form::textarea('additional_questions', $question->additional_questions ?? '', ['class' => 'form-control question-additional-question mt-1', 'id' => 'additional_questions', 'aria-describedby' => 'additional_questionsHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '200', 'style' => 'height : 64px;']) !!}
                                    <small id="additional_questionsHelp" class="form-text text-muted"> {{ __('Dodatno direktno pitanje koje se nadovezuje na inicijalno pitanje') }} </small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_q_answer"> <b>{{ __('Odgovor na pitanje') }}</b> </label>
                                    {!! Form::text('additional_q_answer', $question->additional_q_answer ?? '', ['class' => 'form-control question-additional-answer mt-1', 'id' => 'additional_q_answer', 'aria-describedby' => 'additional_q_answerHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '200']) !!}
                                    <small id="additional_q_answerHelp" class="form-text text-muted"> {{ __('Odgovor / objašnjenje na direktno(g) pitanje(a)') }} </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($preview))
                @include('system.quiz.questions.snippets.right-menu')
            @endif
        </div>
    </div>
@endsection
