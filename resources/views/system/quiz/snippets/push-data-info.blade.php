<div class="col-md-3">
    <div class="row">
        <div class="col-md-12">

            <div class="card" title=" {{ __('') }} ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <h6 class="pt-1"> <b> {{ __('Sync response') }} </b> </h6>
                                    <a href="#" title="{{ __('Ostali statistički podaci vezani za pitanje') }}">
                                        <small><i class="fas fa-question"></i></small>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="sync-response-row">
                                    <div class="srr-text">
                                        <i class="fas fa-users"></i>
                                        <p> {{ __('Korisnici') }} </p>
                                    </div>
                                    <div class="srr-values">
                                        <b>
                                            <p title="{{ __('Broj spremljenih korisnika u centralni sistem') }}"> {{ session()->get('api-success')['data']->newUsers }}  </p>
                                            <span>|</span>
                                            <p title="{{ __('Ukupan broj korisnika poslan sa lokalnog sistema') }}"> {{ session()->get('api-success')['data']->receivedUsers }}  </p>
                                        </b>
                                    </div>
                                </div>

                                <hr>

                                <div class="sync-response-row">
                                    <div class="srr-text">
                                        <i class="fa-solid fa-clipboard-question"></i>
                                        <p class="srr-t-sets"> {{ __('Setovi pitanja') }} </p>
                                    </div>
                                    <div class="srr-values">
                                        <b>
                                            <p title="{{ __('Uspješno ažuriranih setova') }}"> {{ session()->get('api-success')['data']->updatedSets }}  </p>
                                            <span>|</span>
                                            <p title="{{ __('Ukupan broj setova poslanih za ažuriranja') }}"> {{ session()->get('api-success')['data']->receivedSets }}  </p>
                                        </b>
                                    </div>
                                </div>

                                <hr>

                                <div class="sync-response-row">
                                    <div class="srr-text">
                                        <i class="fa-solid fa-circle-question"></i>
                                        <p class="srr-t-questions"> {{ __('Pitanja') }} </p>
                                    </div>
                                    <div class="srr-values">
                                        <b>
                                            <p title="{{ __('Broj otključanih pitanja za javnost') }}"> {{ session()->get('api-success')['data']->publishedQuestions }}  </p>
                                            <span>|</span>
                                            <p title="{{ __('Ukupan broj pitanja sa seta') }}"> {{ session()->get('api-success')['data']->receivedQuestions }}  </p>
                                        </b>
                                    </div>
                                </div>

                                <hr>
                            </div>

                            @if(count(session()->get('api-success')['data']->failedUsers))
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <h6 class="pt-1"> <b> {{ __('Nesinhronizovani korisnici') }} </b> </h6>
                                        <a href="#" title="#">
                                            <small><i class="fas fa-question"></i></small>
                                        </a>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <ol>
                                            @foreach(session()->get('api-success')['data']->failedUsers as $user)
                                                <li>{{ $user->name }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{--                    <hr>--}}

                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md-12 d-flex justify-content-between">--}}
                    {{--                            <h6 class="pt-1"> {{ __('Kontakt informacije') }} </h6>--}}
                    {{--                            <a href="#" title=" {{ __('Uredite kontakt informacije') }} ">--}}
                    {{--                                <small><i class="fas fa-edit"></i></small>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md 12 d-flex justify-content-start" {{ __('Službeni email') }}>--}}
                    {{--                            <i class="fas fa-envelope-open-text pt-1"></i>--}}
                    {{--                            <p class="m-0 ml-3"> <small> info@adsfbih.gov.ba </small> </p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('Broj telefona') }}">--}}
                    {{--                            <i class="fas fa-phone-square pt-1"></i>--}}
                    {{--                            <p class="m-0 ml-3"> <small> +38761225883 </small> </p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <hr>--}}

                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md-12 d-flex justify-content-between">--}}
                    {{--                            <h6 class="pt-1"> {{ __('Ostale informacije') }} </h6>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="row" title="{{ __('Ukupan radni staž') }}">--}}
                    {{--                        <div class="col-md 12 d-flex justify-content-start mt-2">--}}
                    {{--                            <i class="fab fa-buromobelexperte pt-1"></i>--}}
                    {{--                            <p class="m-0 ml-3"> <small> 12 </small> </p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="row" title="{{__('Starost zaposlenika')}}">--}}
                    {{--                        <div class="col-md 12 d-flex justify-content-start mt-2">--}}
                    {{--                            <i class="fas fa-user-clock pt-1"></i>--}}
                    {{--                            <p class="m-0 ml-3"> <small> 55 </small> </p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}




                    {{--                    <div class="row" title="{{__('Evidencija o dodatnim djelatnostima')}}">--}}
                    {{--                        <div class="col-md 12 d-flex justify-content-start mt-2">--}}
                    {{--                            <p class="m-0 text-info"> <small> Ovjde ćemo upisati nešto tamo ... </small> </p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
