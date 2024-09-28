<div class="s-top-menu">
    <div class="app-name">
        <a title="{{__('Homepage')}}">
            <img src="{{ asset('images/logo_black.png') }}" alt="">
        </a>
        <img src="{{ asset('images/font-awesome/bars-solid.svg') }}" class="system-m-i-t" alt="{{__('Open / Close MENU')}}" title="{{__('Open / Close MENU')}}">
{{--        <i class="fas fa-bars t-3 system-m-i-t" title="{{__('Open / Close MENU')}}"></i>--}}
    </div>

    <div class="top-menu-links">
        <!-- Left top icons -->
        <div class="left-icons">
{{--            <div class="single-li" title="{{__('Show off')}}">--}}
{{--                <i class="fas fa-globe-americas"></i>--}}
{{--                <div class="number-of"><p>3</p></div>--}}
{{--            </div>--}}

{{--            <a href="#" target="_blank">--}}
{{--                <div class="single-li">--}}
{{--                    <p> {{__('Blog')}} </p>--}}
{{--                </div>--}}
{{--            </a>--}}

            <a href="#">
                <div class="single-li">
                    <div class="sl-c-button open-line-g-btn open-line-d-btn @if($openLines->value) bg-green @else bg-red @endif" type="default" id="default">
                        <p> {{__('Otvorene linije')}} </p>
                    </div>
                </div>
            </a>
            @foreach($sponsorsData as $sData)
                <a href="#">
                    <div class="single-li">
                        <div class="sl-c-button open-line-g-btn open-line-sd-{{$sData->elem_name}} @if($sData->status == "Hidden") bg-red @else bg-green @endif" type="sponsor-data" id="{{ $sData->elem_name }}">
                            <p> {{ $sData->title }} </p>
                        </div>
                    </div>
                </a>
            @endforeach

{{--            <a href="#">--}}
{{--                <div class="single-li">--}}
{{--                    <div class="sl-c-button live-feed-g-btn">--}}
{{--                        <i class="fa-solid fa-heart-pulse fa-beat "> </i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
        </div>

        <!-- Right top icons -->
        <div class="right-icons">
            <div class="single-li main-search-w" title="">
                <i class="fas fa-search main-search-t" title="{{__('Search')}}"></i>
            </div>

            <a href="{{ route('system.users.my-profile') }}">
                <div class="single-li user-name">
                    <p><b> {{ auth()->user()->name }} </b></p>
                </div>
            </a>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<div class="s-left-menu t-3">
    <!-- user Info -->
    <div class="user-info">
        <div class="user-image">
            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="{{ isset($loggedUser->profileImgRel) ? asset( $loggedUser->profileImgRel->getFile()) : asset('images/user.png')}}" alt="">
        </div>
        <div class="user-desc">
            <h4> {{ auth()->user()->name }} </h4>
            <p> {{ auth()->user()->city }}, {{ auth()->user()->countryRel->name }} </p>
            <p>
                <i class="fas fa-circle"></i>
                Online
            </p>
        </div>
    </div>
    <hr>

    <!-- Menu subsection -->
    <div class="s-lm-subsection">
        <div class="subtitle">
            <h4> {{__('Grafički podaci')}} </h4>
            <div class="subtitle-icon">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>

        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <img src="{{ asset('images/font-awesome/house-solid.svg') }}" alt="">
                    </div>
                    <p>{{__('Dashboard')}}</p>
                </div>
            </div>
        </a>

        <div class="subtitle live-feed-m-elem @if(!isset($activeQuiz)) d-none @endif">
            <h4> {{__('Zaigrajmo kviz')}} </h4>
            <div class="subtitle-icon">
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>

        <a href="@if(isset($activeQuiz)) {{ route('system.quiz-play.live', ['quiz_id' => $activeQuiz->id ]) }} @endif" class="menu-a-link live-feed-m-elem lf-m-e-w @if(!isset($activeQuiz)) d-none @endif" active-quiz="12">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <img src="{{ asset('images/font-awesome/heart-pulse-solid.svg') }}" alt="">
                    </div>
                    <p>{{__('Live feed')}}</p>
                </div>
            </div>
        </a>

        @if(auth()->user()->role == 4)
            <div class="subtitle">
                <h4> {{__('Administratorski portal')}} </h4>
                <div class="subtitle-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
            </div>

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <img class="clipboard-question" src="{{ asset('images/font-awesome/clipboard-question-solid.svg') }}" alt="">
                        </div>
                        <p>{{__('Kviz')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><img class="fa-angle-right" src="{{ asset('images/font-awesome/chevron-right-solid.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{ route('system.quiz') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Pregled svih kvizova')}}</p>
                            </div>
                        </a>
                        <a href="{{ route('system.quiz.sync-quizzes') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{ __('Sync from center') }}</p>
                            </div>
                        </a>
                        <a href="{{ route('system.quiz.sync-quizzes-to-center') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{ __('Push data to center') }}</p>
                            </div>
                        </a>
                        <a href="{{ route('system.quiz.questions') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Pitanja i odgovori')}}</p>
                            </div>
                        </a>
                        <a href="{{ route('system.quiz.demo') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Demo version')}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </a>

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <img class="users" src="{{ asset('images/font-awesome/users-solid.svg') }}" alt="">
                        </div>
                        <p>{{__('Korisnici')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><img class="fa-angle-right" src="{{ asset('images/font-awesome/chevron-right-solid.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{ route('system.quiz-play.users.create-user') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Novi korisnik')}}</p>
                            </div>
                        </a>
                        <a href="{{ route('system.users.all-users') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Pregled svih')}}</p>
                            </div>
                        </a>
                        {{--<a href="{{ route('system.users.users-history') }}">--}}
                        {{--    <div class="inside-lm-link">--}}
                        {{--        <div class="ilm-l"></div><div class="ilm-c"></div>--}}
                        {{--        <p>{{__('Historija igrača')}}</p>--}}
                        {{--    </div>--}}
                        {{--</a>--}}
                    </div>
                </div>
            </a>

            <div class="subtitle">
                <h4> {{__('Ostali sadržaj')}} </h4>
            </div>

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <img class="gears" src="{{ asset('images/font-awesome/hand-holding-heart-solid.svg') }}" alt="">
                        </div>
                        <p>{{__('Sponzori')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><img class="fa-angle-right" src="{{ asset('images/font-awesome/chevron-right-solid.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{ route('system.sponsors') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Pregled')}}</p>
                            </div>
                        </a>
                        <a href="{{ route('system.sponsors.create') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Unos novog')}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </a>

            <hr>

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <img class="gears" src="{{ asset('images/font-awesome/gear-solid.svg') }}" alt="">
                        </div>
                        <p>{{__('Postavke')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><img class="fa-angle-right" src="{{ asset('images/font-awesome/chevron-right-solid.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{ route('system.settings.keywords') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Šifarnici')}}</p>
                                <div class="additional-icon ai-grey">
                                    <img class="key" src="{{ asset('images/font-awesome/key-solid.svg') }}" alt="">
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('system.settings.seasons') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Sezone')}}</p>
                                <div class="additional-icon ai-grey">
                                    <img class="key" src="{{ asset('images/font-awesome/calendar-regular-white.svg') }}" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        @endif
    </div>

{{--    @include('system.templates.menu.bottom-icons')--}}
</div>
