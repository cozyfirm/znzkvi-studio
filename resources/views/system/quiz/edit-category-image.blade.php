@extends('system.templates.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <img class="clipboard-question" src="{{ asset('images/font-awesome/clipboard-question-solid.svg') }}" alt=""> @endsection
@section('ph-main') {{ __('Slika kategorije') }} @endsection
@section('ph-short') {{__('Izmijenite sliku kategorije odabranog pitanja (sponzorska slika).')}} @endsection

@section('ph-navigation')
    / <a href="{{ route('system.quiz') }}"> .. </a>
    / <a href="{{ route('system.quiz.preview', ['id' => $quiz->id ]) }}"> {{ __('Pregled seta') }} </a>
    / <a href="#"> {{ __('Uredite sliku') }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.quiz.update-category-image', 'method' => 'post')) !!}
                {!! Form::hidden('quiz_id', $quiz->id) !!}
                {!! Form::hidden('id', $question->id ) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question"> <b>{{ __('Pitanje') }}</b> </label>
                                    {!! Form::text('question', $question->question , ['class' => 'form-control mt-1', 'id' => 'date', 'aria-describedby' => 'questionHelp', 'readonly' ]) !!}
                                    <small id="questionHelp" class="form-text text-muted"> {{ __('Unesite datum kada se kviz održava') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image"> <b>{{ __('Slika kategorije') }}</b> </label>
                                    {!! Form::select('image', $images, $question->category_image ?? '0', ['class' => 'form-control required mt-1', 'id' => 'image', 'aria-describedby' => 'imageHelp']) !!}
                                    <small id="imageHelp" class="form-text text-muted"> {{ __('Odaberite željenu sliku, za koju želite da se prikaže na kategoriji') }} </small>
                                </div>
                            </div>
                        </div>

                        @if(!isset($preview))
                            <div class="row mt-3 mb-4">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
