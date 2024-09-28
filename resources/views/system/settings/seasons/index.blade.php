@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img src="{{ asset('images/font-awesome/calendar-regular.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('ZNZKVI Sezone') }} @endsection
@section('ph-short') {{__('Pregled sezona i epizoda na TV-u - www.znzkvi.ba')}} | <a href="{{ route('system.settings.seasons.sync') }}" title="{{ __('Sinhronizujte epizode sa centralnog sistema') }}">{{ __('Sinhronizacija') }}</a> @endsection

@section('ph-navigation') / <a href="{{ route('system.settings.seasons') }}"> {{ __('Sezone') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @include('system.templates.filters.filters', ['var' => $episodes])
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
            @foreach($episodes as $episode)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $episode->seasonRel->name ?? ''}} </td>
                    <td> {{ $episode->episode ?? ''}} </td>
                    <td> {{ $episode->date() }} </td>

                    <td class="text-center">
                        <a href="{{ route('system.settings.seasons.preview', ['id' => $episode->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-sm btn-xs">{{ __('Pregledajte') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
