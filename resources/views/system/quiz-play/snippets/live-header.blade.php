<div class="live-header">
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> {{ $quiz_no }} / {{ $total_quizzes }} </h2>
            <p> {{ __('Broj kviza') }} </p>
        </div>
        <div class="lh-e-icon">
            <img src="{{ asset('images/font-awesome/hashtag-solid.svg') }}" alt="">
        </div>
    </div>
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> <span id="lf-current-question"> {{ $quiz->current_question }} </span> . </h2>
            <p> {{ __('Aktivno pitanje') }} </p>
        </div>
        <div class="lh-e-icon">
            <img src="{{ asset('images/font-awesome/person-circle-question-solid.svg') }}" alt="">
        </div>
    </div>
    <div class="lh-element question-timer-wrapper">
        <div class="lh-e-data">
            <h2>
                <img class="fa-infinity @if($quiz->current_question != 1) d-none @endif" src="{{ asset('images/font-awesome/infinity-solid.svg') }}" alt="">
                <span class="question-timer @if($quiz->current_question == 1) d-none @endif">@if($additional) 10 @else 5 @endif</span> <span class="question-timer-seconds @if($quiz->current_question == 1) d-none @endif">s</span>
            </h2>
            <p> {{ __('Vrijeme') }} </p>
        </div>
        <div class="lh-e-icon">
            <img src="{{ asset('images/font-awesome/stopwatch-solid.svg') }}" alt="">
        </div>
    </div>
    <div class="lh-element joker-wrapper @if($joker) joker-used @endif">
        <div class="lh-e-data">
            <h2>
                <img class="fa-check mt-1" src="{{ asset('images/font-awesome/check-solid.svg') }}" alt="">
                <img class="fa-times mt-1" src="{{ asset('images/font-awesome/times-red-solid.svg') }}" alt="">
            </h2>
            <p> {{ __('Joker') }} </p>
        </div>
        <div class="lh-e-icon">
            <img src="{{ asset('images/font-awesome/face-grin-tongue-wink-regular.svg') }}" alt="">
        </div>
    </div>
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> KM <span id="lf-total-money"> {{ $quiz->total_money }} </span> </h2>
            <p> {{ __('Osvojeno') }} </p>
        </div>
        <div class="lh-e-icon">
            <img src="{{ asset('images/font-awesome/sack-dollar-solid.svg') }}" alt="">
        </div>
    </div>
    <div class="lh-element reveal-mid-screen">
        <div class="lh-e-data">
            <h2>
                <span id="lf-line-opened">
                    <img class="fa-eye @if($firstTime) d-none @endif" src="{{ asset('images/font-awesome/eye-regular.svg') }}" alt="">
                    <img class="fa-eye-slash @if(!$firstTime) d-none @endif" src="{{ asset('images/font-awesome/eye-slash-solid.svg') }}" alt="">
                    <img class="fa-spinner d-none" src="{{ asset('images/font-awesome/spin.svg') }}" alt="">

{{--                    <i class="fa-regular fa-eye @if($firstTime) d-none @endif"></i>--}}
{{--                    <i class="fa-regular fa-eye-slash @if(!$firstTime) d-none @endif"></i>--}}
{{--                    <i class="fa-solid fa-spinner fa-spin d-none"></i>--}}
{{--                    <i class="fa-solid fa-ban"></i>--}}
                </span>
            </h2>
            <p> {{ __('Mid Screen') }} </p>
        </div>
        <div class="lh-e-icon">
            <img src="{{ asset('images/font-awesome/display-solid.svg') }}" alt="">
        </div>
    </div>

    {{--<div class="lh-element">--}}
    {{--    <div class="lh-e-data">--}}
    {{--        <h2> <span id="lf-line-opened"> DA </span> </h2>--}}
    {{--        <p> {{ __('Linija otvorena') }} </p>--}}
    {{--    </div>--}}
    {{--    <div class="lh-e-icon">--}}
    {{--        <i class="fa-solid fa-phone-volume"></i>--}}
    {{--    </div>--}}
    {{--</div>--}}
</div>
