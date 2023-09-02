<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{ __('Studio quiz') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo_black.png')}}"/>

    <!-- ToDo - Download all external files -->
    <!-- Stylesheet -->
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/system/system.css')}}">
    <link rel="stylesheet" href="{{asset('css/public/public.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/024a995986.js" crossorigin="anonymous"></script>

    <!-- Javascript scripts -->
    <script src="external-js/mqtt.min.js"></script>

    <script src="{{asset('js/system.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('js/public.js')}}"></script>
</head>
<body>
<!-- Import script for live quiz handling -->
<script src="{{asset('js/mqtt/presenter-script.js')}}"></script>

<!-- Require SVG file -->
<div class="presenter-wrapper">
    <div class="left-side">
        <div class="user-info">
            <div class="quiz-no">
                <div class="qn_c"> <p>3</p> </div>
                <div class="slash"></div>
                <div class="qn_t"> <p>16</p> </div>
            </div>
            <div class="user-data">
                <h2 class="ps-user-name">  </h2>
                <p class="ps-user-address">  </p>
            </div>
            <div class="stars">
                <div class="stars-w">
                    <div class="single-star star-1">
                        <img class="just-star" src="{{ asset('images/presenter-images/star.png') }}" alt="">
                        <img class="yellow-star d-none" src="{{ asset('images/presenter-images/yellow-star.png') }}" alt="">
                    </div>
                    <div class="single-star star-2">
                        <img class="just-star" src="{{ asset('images/presenter-images/star.png') }}" alt="">
                        <img class="yellow-star d-none" src="{{ asset('images/presenter-images/yellow-star.png') }}" alt="">
                    </div>
                    <div class="single-star star-3">
                        <img class="just-star" src="{{ asset('images/presenter-images/star.png') }}" alt="">
                        <img class="yellow-star" src="{{ asset('images/presenter-images/yellow-star.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="question-data">
            <div class="inner-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::textarea('question', '', ['class' => 'form-control', 'id' => 'question', 'readonly', 'style' => 'height:180px !important;']) !!}
                        </div>
                    </div>
                </div>

                <div class="single-question-answers">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"> <div class="input-group-text a-l-l answer-A-label"> <b>A</b> </div> </div>
                                {!! Form::text('answer_a', '', ['class' => 'form-control', 'id' => 'answer_a', 'readonly', 'letter' => 'A']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"> <div class="input-group-text a-l-l answer-B-label"> <b>B</b> </div> </div>
                                {!! Form::text('answer_b', '', ['class' => 'form-control', 'id' => 'answer_b', 'readonly', 'letter' => 'B']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"> <div class="input-group-text a-l-l answer-C-label"> <b>C</b> </div> </div>
                                {!! Form::text('answer_c', '', ['class' => 'form-control', 'id' => 'answer_c', 'readonly', 'letter' => 'C']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"> <div class="input-group-text a-l-l answer-D-label"> <b>D</b> </div> </div>
                                {!! Form::text('answer_d', '', ['class' => 'form-control', 'id' => 'answer_d', 'readonly', 'letter' => 'D']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="additional-question-answer d-none">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::textarea('aq_answer', 'Parlament Kantona Sarajevo', ['class' => 'form-control', 'id' => 'aq_answer', 'readonly', 'style' => 'height:105px !important;']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-side">

        <div class="statistics-header">
            <p>{{ __('Statistički podaci') }}</p>

            <small><i class="fa-solid fa-chart-simple"></i></small>
        </div>

        <hr class="mt-0">

        <div class="all-users-score">
            <div class="statistics-row">
                <div class="sr-no"> <p> 1. </p> </div>
                <div class="sr-user">
                    <h4> Aladin Kapić </h4>
                    <p> Sarajevo, Bosna i Hercegovina </p>
                </div>
                <div class="sr-icons">
                    <div class="icon-wrapper" title="{{ __('Ukupno osvojeno BAM ') }} 100">
                        <i class="fa-solid fa-sack-dollar"></i>
                        <div class="iw-t"> <p> 200 </p> </div>
                    </div>
                </div>
            </div>
            <div class="statistics-row">
                <div class="sr-no"> <p> 2. </p> </div>
                <div class="sr-user">
                    <h4> Jovan Perišić </h4>
                    <p> Donji Vakuf, Bosna i Hercegovina </p>
                </div>
                <div class="sr-icons">
                    <div class="icon-wrapper" title="{{ __('Ukupno osvojeno BAM ') }} 100">
                        <i class="fa-solid fa-sack-dollar"></i>
                        <div class="iw-t"> <p> 50 </p> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
