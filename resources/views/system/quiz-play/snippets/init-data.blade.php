<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
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
                                    <a href="#" class="m-0 ml-3"> <small> {{ __('Ukupno generisanih') }} <b> {{ $totalSets }} </b> {{ __('setova pitanja!') }} </small> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('') }}">
                                    <a href="#" class="m-0 ml-3"> <small> {{ $totalUsedSets }} </small> </a>
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
                                    <a href="#" class="m-0 ml-3"> <small> <i class="fa-solid fa-sack-dollar"></i> {{ __('Osvojeno') }} <b>{{ $totalMoney }} BAM </b> u {{ ($numOfTotalUsedSets / $totalSets) * 100 }} % {{ __('otvorenih setova') }} ! </small> </a>
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
