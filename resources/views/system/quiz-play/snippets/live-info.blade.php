<div class="col-md-4 border-left">
    <div class="row">
        <div class="col-md-12">
{{--            <div class="card c-pointer joker-wrapper @if($joker) joker-wrapper-used @endif">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12 d-flex justify-content-between">--}}
{{--                            <h2 class="m-0 live-joker-text">JOKER</h2>--}}
{{--                            <img class="live-joker" src="{{ asset('images/live/joker.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <h6 class="pt-1"> <b> {{ __('Statistički podaci') }} </b> </h6>
                                    <a href="#" title="{{ __('Ostali statistički podaci ') }}">
                                        <small><i class="fa-solid fa-chart-simple"></i></small>
                                    </a>
                                </div>
                            </div>

                            <hr>

                            <!-- User statistics -->
                            @foreach($users as $user)
                                <div class="statistics-row">
                                    <div class="sr-no"> <p> {{ $counter++ }}. </p> </div>
                                    <div class="sr-user">
                                        <h4> {{ $user->userRel->name }} </h4>
                                        <p> {{ $user->userRel->city }}, {{ $user->userRel->countryRel->name }} </p>
                                    </div>
                                    <div class="sr-icons">
                                        <div class="icon-wrapper" title="@if($user->joker) {{ __('Joker iskorišten') }} @else {{ __('Joker nije iskorišten') }} @endif ">
                                            <i class="fa-regular fa-face-grin-tongue-wink"></i>
                                        </div>
                                        <div class="icon-wrapper" title="{{ __('Ukupno osvojeno BAM ') }} {{ $user->total_money }}">
                                            <i class="fa-solid fa-sack-dollar"></i>
                                            <div class="iw-t"> <p> {{ $user->total_money }} </p> </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <hr>
                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('Ažurirajte: Objavljeni naučni radovi') }}">
                                    <a href="#" class="m-0 ml-3"> <small> <i class="fas fa-check"></i> 18 tačnih odgovora </small> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('Ažurirajte: Objavljeni naučni radovi') }}">
                                    <a href="#" class="m-0 ml-3"> <small> <i class="fas fa-wallet"></i> {{ __('Osvojeno') }} 50 BAM </small> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
