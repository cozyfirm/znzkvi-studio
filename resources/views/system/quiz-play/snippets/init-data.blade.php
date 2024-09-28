<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card users-card d-none mb-3" title=" {{ __('Informacije o potencijalnom podudaranju - korisnicima koji su prije učestvovali na kvizu') }} ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="all__users__wrapper">
                                <div class="users__header">
                                    <h6>{{ __('Potencijalno podudaranje') }}</h6>
                                    <img src="{{ asset('images/font-awesome/users-solid-white.svg') }}" alt="">
                                </div>

                                <div class="users__invisible__wrapper">
                                    {{--<div class="user__wrapper">--}}
                                    {{--    <div class="user__info">--}}
                                    {{--        <p>Aladin Kapić</p>--}}
                                    {{--        <img class="arrow" src="{{ asset('images/font-awesome/chevron-down-solid.svg') }}" alt="">--}}
                                    {{--    </div>--}}

                                    {{--    <div class="users__rest__data ">--}}
                                    {{--        <ul>--}}
                                    {{--            <li> info@email.com </li>--}}
                                    {{--            <li> +38761683449 </li>--}}
                                    {{--        </ul>--}}

                                    {{--        <div class="use__it">--}}
                                    {{--            <p>Preuzmi podatke</p>--}}
                                    {{--        </div>--}}
                                    {{--    </div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="card" title=" {{ __('Ostale informacije') }} ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <h6 class="pt-1"> <b> {{ __('Informacije o setovima') }} </b> </h6>
                                    <a href="#" title="{{ __('Ostali statistički podaci vezani za setove pitanja') }}">
                                        <small><i class="fas fa-question"></i></small>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('') }}">
                                    <a href="#" class="m-0 ml-3"> <small> {{ $totalUsedSets }} {{ __('od dostupnih') }}  <b>{{ $totalSets }}</b> {{ __('setova!') }} </small> </a>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <h6 class="pt-1"> <b> {{ __('Ostale informacije') }} </b> </h6>
                                    <a href="#" title="{{ __('Ostali statistički podaci vezani za setove pitanja') }}">
                                        <small><i class="fa-solid fa-circle-info"></i></small>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('Ažurirajte: Objavljeni naučni radovi') }}">
                                    <a href="#" class="m-0 ml-3"> <small> <i class="fa-solid fa-sack-dollar"></i> {{ __('Osvojeno') }} <b>{{ $totalMoney }} BAM </b> u @if($totalSets) {{ ($numOfTotalUsedSets / $totalSets) * 100 }} @else 0 @endif % {{ __('otvorenih setova') }} ! </small> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('Ažurirajte: Objavljeni naučni radovi') }}">
                                    <a href="#" class="m-0 ml-3"> <small> <i class="fa-solid fa-lock-open"></i> {{ __('Ukupno otvoreno') }} {{ $questionsOpened }} {{ __('pitanja.') }}</small> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
