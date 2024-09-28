@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img src="{{ asset('images/font-awesome/users-solid.svg') }}" > @endsection
@section('ph-main') {{ __('Historija igrača') }} @endsection
@section('ph-short') {{__('Pregled svih igrača u sezoni 2024/2025 na www.znzkvi.ba sistemu')}} @endsection

@section('ph-navigation') / <a href="{{ route('system.users.users-history') }}"> {{ __('Historija igrača') }} </a> @endsection

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
                    <td> {{ $user->prefix ?? ''}}{{ $user->phone ?? ''}} </td>
                    <td> {{ $user->address ?? ''}} </td>
                    <td> {{ $user->city ?? ''}} </td>
                    <td> {{ $user->countryRel->name_ba ?? '' }} </td>

                    <td>
                        <ul class="m-0 p-0 list-unstyled">
                            @foreach($user->scoreRel as $score)
                                <li>{{ $score->date() ?? '' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="m-0 p-0 list-unstyled">
                            @foreach($user->scoreRel as $score)
                                <li>{{ $score->correct_answers ?? '' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="m-0 p-0 list-unstyled">
                            @foreach($user->scoreRel as $score)
                                <li>
                                    @isset($score->jokerRel->name)
                                        {{ $score->jokerRel->name ?? '' ?? '' }}
                                    @else
                                        {{ "Ne" }}
                                    @endisset
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="m-0 p-0 list-unstyled">
                            @foreach($user->scoreRel as $score)
                                <li>{{ $score->threshold ?? '' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="m-0 p-0 list-unstyled">
                            @foreach($user->scoreRel as $score)
                                <li>{{ $score->total_money ?? '' }} KM</li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="text-center">
                        <a href="{{ route('system.users.users-history.preview', ['id' => $user->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-sm">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
