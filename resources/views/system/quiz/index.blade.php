@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="clipboard-question" src="{{ asset('images/font-awesome/clipboard-question-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Pregled setova') }} @endsection
@section('ph-short') {{__('Pregled svih kvizova (setova pitanja) na sistemu - Offline & Online mode')}} @endsection

@section('ph-navigation') / <a href="{{ route('system.quiz') }}"> {{ __('Pregled setova') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.templates.filters.filters', ['var' => $quizzes])

        @if(session()->has('success'))
            <div class="alert alert-success mt-3"> {{ session()->get('success') }} </div>
        @elseif(session()->has('api-success'))
            <div class="alert alert-success mt-3"> {{ session()->get('api-success')['message'] }}  </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger mt-3"> {{ session()->get('error') }} </div>
        @endif

        <div class="row mt-3">
            <div class="@if(session()->has('api-success')) col-md-9 @else col-md-12 @endif">
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
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td class="text-center">{{ $i++}}. </td>
                            <td> {{ $quiz->date() ?? ''}} </td>
                            <td> {{ $quiz->userRel->name ?? '/'}} </td>
                            <td> {{ $quiz->activeRel->name ?? ''}} </td>
                            <td> {{ $quiz->correct_answers ?? ''}} </td>
                            <td> {{ $quiz->threshold ?? ''}} </td>
                            <td> {{ $quiz->total_money ?? ''}} BAM </td>
                            <td> {{ $quiz->startedRel->name ?? ''}} </td>
                            <td> {{ $quiz->finishedRel->name ?? ''}} </td>

                            <td class="text-center">
                                <a href="{{ route('system.quiz.preview', ['id' => $quiz->id ]) }}" title="{{ __('Više informacija') }}">
                                    <button class="btn btn-dark btn-sm">{{ __('Pregled') }}</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @if(session()->has('api-success'))
                @include('system.quiz.snippets.push-data-info')
            @endif
        </div>
    </div>
@endsection
