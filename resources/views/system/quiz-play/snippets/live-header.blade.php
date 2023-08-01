<div class="live-header">
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> 6 / 12 </h2>
            <p> {{ __('Broj kviza') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-solid fa-hashtag"></i>
        </div>
    </div>
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> 1. </h2>
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
    <div class="lh-element">
        <div class="lh-e-data">
            @if(!$joker)
                <h2><i class="fas fa-check"></i></h2>
            @else
                <h2><i class="fas fa-times"></i></h2>
            @endif
            <p> {{ __('Joker') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-regular fa-face-grin-tongue-wink"></i>
        </div>
    </div>
    <div class="lh-element">
        <div class="lh-e-data">
            <h2> BAM 50 </h2>
            <p> {{ __('Osvojeno') }} </p>
        </div>
        <div class="lh-e-icon">
            <i class="fa-solid fa-sack-dollar"></i>
        </div>
    </div>
</div>
