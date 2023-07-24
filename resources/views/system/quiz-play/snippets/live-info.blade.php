<div class="col-md-4 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card c-pointer joker-wrapper joker-wrapper-used">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <h2 class="m-0 live-joker-text">JOKER</h2>
                            <img class="live-joker" src="{{ asset('images/live/joker.png') }}" alt="">
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <h6 class="pt-1"> <b> {{ __('Informacije o kvizu') }} </b> </h6>
                                    <a href="#" title="{{ __('Ostali statistički podaci vezani za ovaj set pitanja') }}">
                                        <small><i class="fas fa-question"></i></small>
                                    </a>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('') }}">
                                    <a href="#" class="m-0 ml-3"> <small> {{ __('Trenutno aktivno') }} <b> 1. </b> {{ __('pitanje.') }} </small> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('') }}">
                                    <a href="#" class="m-0 ml-3">
                                        <small> {{ __('Joker još nije iskorišten!') }} </small>
                                        <small>
                                            -
                                            <button class="btn btn-xs btn-success pt-1 pb-1 pl-3 pr-3"> Iskoristi Joker </button>
                                        </small>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md 12 d-flex justify-content-start mt-2" title="{{ __('') }}">
                                    <a href="#" class="m-0 ml-3"> <small> {{ __('Korisnik') }} {{ $user->name }} {{ __('je do sad osvojio: ') }} <b>0</b> BAM. </small> </a>
                                </div>
                            </div>

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
