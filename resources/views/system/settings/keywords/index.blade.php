@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img src="{{ asset('images/font-awesome/key-black-solid.svg') }}" > @endsection
@section('ph-main') {{ __('Pregled šifarnika') }} @endsection
@section('ph-short')
    {{__('Kopije šifarnika koji se nalaze na centralnom sistemu www.znzkvi.ba')}}
    | <a href="{{ route('system.settings.keywords.sync') }}" title="{{ __('Kliknite ovdje kako bi ste izvršili sinhronizaciju šifarnika sa centralnim sistemom') }}">{{ __('Sinhronizacija šifarnika') }}</a>
@endsection

@section('ph-navigation') / <a href="{{ route('system.settings.keywords') }}"> {{ __('Pregled šifarnika') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @if(session()->has('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger mt-3">
                {{ session()->get('error') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="80px" class="text-center">{{ __('#') }}</th>
                <th>{{ __('Vrsta šifarnika') }}</th>
                <th width="120px" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($keywords as $keyword)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $keyword->display ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{ route('system.settings.keywords.preview-instances', ['key' => $keyword->type ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-xs">{{ __('Više info') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
