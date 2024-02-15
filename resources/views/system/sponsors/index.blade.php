@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="gears" src="{{ asset('images/font-awesome/hand-holding-heart-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Sponzorski GUI') }} @endsection
@section('ph-short') {{__('Pregled svih aktivnih korisnika na www.znzkvi.ba sistemu')}} @endsection

@section('ph-navigation') / <a href="{{ route('system.users.all-users') }}"> {{ __('Sponzori') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.templates.filters.filters', ['var' => $sponsors])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.templates.filters.filters_header')
                <th width="160px" class="akcije text-center">{{__('Status na TV-u')}}</th>
                <th width="120px" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i = Page::get(); @endphp
            @foreach($sponsors as $sponsor)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $sponsor->title ?? ''}} </td>
                    <td> {{ $sponsor->elem_name ?? ''}} </td>
                    <td> @if($sponsor->category == 'category') {{ __('Kategorija') }} @else {{ __('Otvorene linije') }} @endif </td>
                    <td class="text-center pl-3 pr-3">
                        <button class="btn btn-sm mr-3 btn-danger w-75 change-sponsor-element-status" elem-id="{{ $sponsor->elem_name }}" real-id="{{ $sponsor->id }}" status="{{ $sponsor->status }}">
                            <b>{{ $sponsor->status ?? '' }}</b>
                        </button>
                    </td>

                    <td class="text-center">
                        <a href="{{ route('system.sponsors.delete', ['id' => $sponsor->id ]) }}" title="{{ __('Obrišite uzorak') }}">
                            <button class="btn btn-dark btn-sm">{{ __('Obrišite') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
