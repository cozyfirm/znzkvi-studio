@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="clipboard-question" src="{{ asset('images/font-awesome/clipboard-question-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Pregled seta') }} @endsection
@section('ph-short')
    {{__('Pregledajte / unesite novi set pitanja na sistemu - Offline & Online mode')}}
    | <a href="{{route('system.quiz.delete', ['id' => $quiz->id])}}" class="delete-item" d-title="{{ __('KVIZ') }}" }}> {{__('Obrišite kviz')}} </a>
@endsection

@section('ph-navigation')
    / <a href="{{ route('system.quiz') }}"> {{ __('Pregled setova') }} </a>
    / <a href="#"> {{ __('Pregled seta') }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <div class="row">
            <div class="@if(isset($preview)) col-md-9 @else col-md-12 @endif">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date"> <b>{{ __('Datum održavanja') }}</b> </label>
                                    {!! Form::text('date', isset($quiz) ? $quiz->date() : date('d.m.Y'), ['class' => isset($preview) ? 'form-control mt-1' : 'form-control datepicker mt-1', 'id' => 'date', 'aria-describedby' => 'dateHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '10', 'minlength' => '10']) !!}
                                    <small id="dateHelp" class="form-text text-muted"> {{ __('Unesite datum kada se kviz održava') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="online"> <b>{{ __('Mjesto održavanja') }}</b> </label>
                                    {!! Form::select('online', ['1' => 'Online', '0' => 'Na TV-u'], $quiz->weight ?? '0', ['class' => 'form-control required mt-1', 'id' => 'online', 'aria-describedby' => 'onlineHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="onlineHelp" class="form-text text-muted"> {{ __('Da li se kviz održava online ili na TV-u?') }} </small>
                                </div>
                            </div>
                        </div>
                        @if(!isset($preview))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="number_of_sets"> <b>{{ __('Broj setova') }}</b> </label>
                                        {!! Form::number('number_of_sets', '1', ['class' => 'form-control required mt-1', 'id' => 'number_of_sets', 'aria-describedby' => 'number_of_setsHelp', 'min' => '', 'max' => '100', 'step' => '1', isset($preview) ? 'readonly' : '']) !!}
                                        <small id="number_of_setsHelp" class="form-text text-muted"> {{ __('Unesite broj setova koji želite da kreirate na odabrani datum') }} </small>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(isset($preview))
                            <hr>

                            <table class="table table-bordered mt-4">
                                <thead>
                                <tr>
                                    <th scope="col" width="60px" class="text-center">#</th>
                                    <th scope="col">{{ __('Pitanje') }}</th>
                                    <th scope="col">{{ __('Kategorija') }}</th>
                                    <th scope="col">{{ __('Tačan odgovor') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $counter = 1 @endphp
                                @foreach($quiz->setRel as $question)
                                    @if($question->questionRel->category != 7)
                                        <tr class="@if($question->replacement) text-secondary @endif">
                                            <th scope="row" class="text-center">
                                                {{ $question->question_no ?? ''}}
                                            </th>
                                            <td> {{ $question->questionRel->question ?? '' }} </td>
                                            <td> {{ $question->questionRel->categoryRel->name ?? '' }} </td>
                                            <td> <b> {{ $question->questionRel->correct_answer }} </b> - {{ $question->questionRel->correctAnswer->answer ?? '' }} </td>
                                        </tr>
                                    @endif
                                    @if($question->level_question or $question->questionRel->category == 7)
                                        <tr class="@if($question->replacement) text-secondary @endif">
                                            <th scope="row" class="text-center">
                                                @if($question->questionRel->category == 7)
                                                    {{ ($question->question_no ?? '0') }}
                                                @else
                                                    ({{ ($question->question_no ?? '0') + 1 }})
                                                @endif
                                            </th>
                                            <td> {{ $question->questionRel->additional_questions ?? '' }} </td>
                                            <td> {{ $question->questionRel->categoryRel->name ?? '' }} </td>
                                            <td> {{ $question->questionRel->additional_q_answer ?? '' }} </td>
                                        </tr>
                                    @endif

                                @endforeach
                                </tbody>
                            </table>
                        @endif

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

            @if(isset($preview))
                @include('system.quiz.snippets.right-menu')
            @endif
        </div>
    </div>
@endsection
