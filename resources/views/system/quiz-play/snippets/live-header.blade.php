<div class="live-header">
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> {{ $quiz_no }} / {{ $total_quizzes }} </h2>
            <p> {{ __('Broj kviza') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-solid fa-hashtag"></i>
        </div>
    </div>
    <div class="lh-element">
        <div class="lh-e-data">
            <h2 id="lf-current-question"> {{ $quiz->current_question }}. </h2>
            <p> {{ __('Aktivno pitanje') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-solid fa-person-circle-question"></i>
        </div>
    </div>
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> 5s </h2>
            <p> {{ __('Vrijeme') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-solid fa-stopwatch"></i>
        </div>
    </div>
    <div class="lh-element joker-wrapper @if($joker) joker-used @endif">
        <div class="lh-e-data">
            <h2>
                <i class="fas fa-check"></i>
                <i class="fas fa-times"></i>
            </h2>
            <p> {{ __('Joker') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-regular fa-face-grin-tongue-wink"></i>
        </div>
    </div>
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> BAM <span id="lf-total-money"> {{ $quiz->total_money }} </span> </h2>
            <p> {{ __('Osvojeno') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-solid fa-sack-dollar"></i>
        </div>
    </div>
</div>
