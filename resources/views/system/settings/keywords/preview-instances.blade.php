@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') {{ __('Instance šifarnika') }} @endsection
@section('ph-short') {{__('Instance (vrijednosti) šifarnika: ')}} <span class="text-info">{{ $keyword }}</span> @endsection

@section('ph-navigation')
    / <a href="{{ route('system.settings.keywords') }}"> {{ __('Pregled šifarnika') }} </a>
    / <a href="#">{{ __('Instance šifarnika') }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="80px" class="text-center">{{ __('#') }}</th>
                <th>{{ __('Vrijednost') }}</th>
                <th>{{ __('Kratki opis') }}</th>
                <th width="180px" class="text-center">{{ __('Specijalna vrijednost') }}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($instances as $instance)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $instance->name ?? '' }} </td>
                    <td> {{ $instance->description }} </td>
                    <td class="text-center"> {{ $instance->value }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
