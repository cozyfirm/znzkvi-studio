@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-users"></i> @endsection
@section('ph-main') {{ __('Svi korisnici') }} @endsection
@section('ph-short') {{__('Pregled svih aktivnih korisnika na www.znzkvi.ba sistemu')}} @endsection

@section('ph-navigation') / <a href="{{ route('system.users.all-users') }}"> {{ __('Svi korisnici') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.templates.filters.filters', ['var' => $users])
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
            @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $user->name ?? ''}} </td>
                    <td> {{ $user->email ?? ''}} </td>
                    <td> {{ $user->phone ?? ''}} </td>
                    <td> {{ $user->address ?? ''}} </td>
                    <td> {{ $user->city ?? ''}} </td>
                    <td> {{ $user->countryRel->name ?? '' }} </td>

                    <td class="text-center">
                        <a href="{{ route('system.users.preview-user', ['username' => $user->username ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-sm">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
