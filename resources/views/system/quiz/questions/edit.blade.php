@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="h-img" src="{{ asset('images/font-awesome/pen-to-square-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Uredite pitanje') }} @endsection
@section('ph-short') {{__('Napomena: Ne smijete mijenjati raspored tačnih i netačnih odgovora!')}} @endsection

@section('ph-navigation')
    / <a href="#"> .. </a>
    / <a href="{{ route('system.quiz.questions.preview-question', ['id' => $question->id]) }}"> {{ __('Pitanje') }} </a>
    / <a href="#">{{ __('Uredite') }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.quiz.questions.update-question', 'method' => 'PUT', 'id' => 'js-form')) !!}
                {!! Form::hidden('id', $question->id, ['class' => 'form-control']) !!}
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
                                    {!! Form::textarea('question', $question->question ?? '', ['class' => 'form-control question-question required mt-1', 'id' => 'question', 'aria-describedby' => 'questionHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '200', 'style' => 'height:64px;']) !!}
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
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"><b class="@if($question->answerARel->correct) text-success @else text-danger @endif">A</b> </div>
                                        </div>
                                        {!! Form::text('answer_a', $question->answerARel->answer ?? '', ['class' => ($question->answerARel->correct) ? 'form-control question-correct-answer' : 'form-control', 'id' => 'answer_a', 'placeholder' => __('Odgovor "A"'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"> <b class="@if($question->answerBRel->correct) text-success @else text-danger @endif ">B</b> </div>
                                        </div>
                                        {!! Form::text('answer_b', $question->answerBRel->answer ?? '', ['class' => ($question->answerBRel->correct) ? 'form-control question-correct-answer' : 'form-control', 'id' => 'answer_b', 'placeholder' => __('Odgovor "B"'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"> <b class="@if($question->answerCRel->correct) text-success @else text-danger @endif ">C</b> </div>
                                        </div>
                                        {!! Form::text('answer_c', $question->answerCRel->answer ?? '', ['class' => ($question->answerCRel->correct) ? 'form-control question-correct-answer' : 'form-control', 'id' => 'answer_c', 'placeholder' => __('Odgovor "C"'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text h-100 w-42p d-inline-flex justify-content-center"> <b class="@if($question->answerDRel->correct) text-success @else text-danger @endif ">D</b> </div>
                                        </div>
                                        {!! Form::text('answer_d', $question->answerDRel->answer ?? '', ['class' => ($question->answerDRel->correct) ? 'form-control question-correct-answer' : 'form-control', 'id' => 'answer_d', 'placeholder' => __('Odgovor "D"'), isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row direct-question">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_questions"> <b>{{ __('Direktno pitanje') }}</b> </label>
                                    {!! Form::textarea('additional_questions', $question->additional_questions ?? '', ['class' => 'form-control question-additional-question mt-1', 'id' => 'question', 'aria-describedby' => 'additional_questionsHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '200', 'style' => 'height : 64px;']) !!}
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
