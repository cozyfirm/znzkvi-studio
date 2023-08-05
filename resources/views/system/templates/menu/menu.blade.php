<div class="s-top-menu">
    <div class="app-name">
        <a title="{{__('Homepage')}}">
            <img src="{{ asset('images/logo_black.png') }}" alt="">
        </a>
        <i class="fas fa-bars t-3 system-m-i-t" title="{{__('Open / Close MENU')}}"></i>
    </div>

    <div class="top-menu-links">
        <!-- Left top icons -->
        <div class="left-icons">
            <div class="single-li" title="{{__('Show off')}}">
                <i class="fas fa-globe-americas"></i>
                <div class="number-of"><p>3</p></div>
            </div>

            <a href="#" target="_blank">
                <div class="single-li">
                    <p> {{__('Blog')}} </p>
                </div>
            </a>

            <a href="#">
                <div class="single-li">
                    <p> {{__('About US')}} </p>
                </div>
            </a>
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
                        <i class="fas fa-home"></i>
                    </div>
                    <p>{{__('Dashboard')}}</p>
                </div>
            </div>
        </a>

        <div class="subtitle">
            <h4> {{__('Zaigrajmo kviz')}} </h4>
            <div class="subtitle-icon">
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>

        <a href="{{ route('system.quiz-play.users.create-user') }}" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fa-solid fa-heart-pulse fa-beat" style="color: #06f99c;" ></i>
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
                            <i class="fa-solid fa-clipboard-question"></i>
                        </div>
                        <p>{{__('Kviz')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
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
                            <i class="fas fa-users"></i>
                        </div>
                        <p>{{__('Korisnici')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{ route('system.users.create-user') }}">
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
                            <i class="fas fa-cogs"></i>
                        </div>
                        <p>{{__('Postavke')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{ route('system.settings.keywords') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Šifarnici')}}</p>
                                <div class="additional-icon ai-grey">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        @endif
    </div>

    @include('system.templates.menu.bottom-icons')
</div>
