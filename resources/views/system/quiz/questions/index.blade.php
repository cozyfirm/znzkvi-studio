@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="h-img" src="{{ asset('images/font-awesome/question-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Pregled pitanja') }} @endsection
@section('ph-short') {{__('Pregled sinhronizovanih pitanja sa centralnog sistema, koji se nalaze unutar setova ')}} @endsection

@section('ph-navigation') / <a href="{{ route('system.quiz.questions') }}"> {{ __('Pregled pitanja') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.templates.filters.filters', ['var' => $questions])

        @if(session()->has('success'))
            <div class="alert alert-success mt-3"> {{ session()->get('success') }} </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger mt-3"> {{ session()->get('error') }} </div>
        @endif

        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.templates.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i = Page::get(); @endphp
            @foreach($questions as $question)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $question->question ?? ''}} </td>
                    <td> {{ $question->categoryRel->name ?? ''}} </td>
                    <td> {{ $question->weight ?? ''}} </td>
                    <td> {{ $question->correct_answer ?? ''}} </td>
                    <td> {{ $question->answerARel->answer ?? ''}} </td>
                    <td> {{ $question->answerBRel->answer ?? ''}} </td>
                    <td> {{ $question->answerCRel->answer ?? ''}} </td>
                    <td> {{ $question->answerDRel->answer ?? ''}} </td>
                    <td> {{ $question->additional_questions ?? '' }} </td>

                    <td class="text-center">
                        <a href="{{ route('system.quiz.questions.preview-question', ['id' => $question->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-sm">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
