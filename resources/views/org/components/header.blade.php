<header>
    <div class="top-header m-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 top-1">
                    <p>@lang('home/home.header.navbar_contact'):
                        <a href="tel:+{{ $info[0]->phone }}">{{ $info[0]->phone }}</a>
                    </p>
                </div><!-- /.col-lg-3 -->
                <div class="col-md-7 col-lg-7 ml-auto top-2 ">
                    <p>
                        <a href="{{ route('contacts') }}">@lang('home/home.header.contacts')</a>
                        <span>|</span>
                        <span style="font-size: 13px;padding-left: 0px!important;">
                                @lang('home/home.header.select_lang')</span>
                        <a href="{{ route('locale', 'tk') }}"><img src="{{ asset('images/tm.png') }}"
                                                                   alt=""></a>
                        <a href="{{ route('locale', 'en') }}"><img src="{{ asset('images/en.png') }}"
                                                                   alt=""></a>
                        <a href="{{ route('locale', 'ru') }}"><img src="{{ asset('images/ru.png') }}"
                                                                   alt=""></a>
                    </p>
                </div><!-- /.col-lg-7 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.top-header -->
    <div class="header ">
        <nav class="navbar navbar-expand-lg navbar-light m-auto ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}">
                <span class="word" style="text-transform: uppercase">@lang('home/home.header.navbar')</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    {{-- About --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">@lang('home/home.header.navbar_li_about')</a>
                        <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($abouts as $about)
                                <a class="dropdown-item"
                                   href="{{ route('abouts', $about->slug) }}">{{ $about->__('title') }}</a>
                            @endforeach
                        </div>
                    </li>
                    {{-- Membership --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('home/home.header.navbar_li_membership')</a>
                        <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($memberships as $membership)
                                <a class="dropdown-item" href="{{ route('membership', $membership->slug) }}">
                                    @if ($membership->title == 'КАК ВСТУПИТЬ В СОТРУДНИЧЕСТВО С ТПП ТУРКМЕНИСТАНА?')
                                        @lang('home/home.header.navbar_li_a_joining')
                                    @else
                                        {{ Str::ucfirst(Str::lower($membership->__('title'))) }}
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </li>

                    {{-- Business info --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('home/home.header.navbar_li_business_info')</a>
                        <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                               href="{{ route('biz-info.tenders') }}">@lang('home/home.header.navbar_li_a_tenders')</a>
                            <a class="dropdown-item"
                               href="{{ route('biz-info.partners') }}">@lang('home/home.header.navbar_li_a_partners')</a>
                            <a class="dropdown-item"
                               href="{{ route('biz-info.tm-offers') }}">@lang('home/home.header.navbar_li_a_tm-offers')</a>
                            <a class="dropdown-item"
                               href="{{ route('biz-info.fo-offers') }}">@lang('home/home.header.navbar_li_a_fo-offers')</a>
                            <a class="dropdown-item"
                               href="{{ route('biz-info.local-brands') }}">@lang('main.brands')</a>
                            <a class="dropdown-item"
                               href="{{ route('biz-info.position') }}">@lang('main.position')</a>
                        </div>
                    </li>

                    {{-- Investments --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('home/home.header.navbar_li_investment_activity')</a>
                        <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($investments as $investment)
                                <a class="dropdown-item" href="{{ route('investment', $investment->slug) }}">
                                    {{ $investment->__('name') }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    {{-- Exhibition --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('home/home.header.navbar_li_exhibition')</a>
                        <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('tm-exhibition') }}">
                                @lang('home/home.header.navbar_li_a_tm-exhibition')
                            </a>
                            <a class="dropdown-item" href="{{ route('fo-exhibition') }}">
                                @lang('home/home.header.navbar_li_a_fo-exhibitions')
                            </a>
                            <a class="dropdown-item" href="{{ route('parcipants') }}">
                                @lang('home/home.header.navbar_li_a_parcipants-events')
                            </a>
                        </div>
                    </li>
                    {{-- Baranches --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('home/home.header.navbar_li_enterprises')</a>
                        <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($branches as $branch)
                                <a class="dropdown-item" href="{{ route('branch', $branch->slug) }}">
                                    {{ $branch->__('name') }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    {{-- Conferens --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('home/home.header.navbar_li_conferences')</a>
                        <div class="dropdown-menu dropdown-menu-right header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($conf as $c)
                                <a class="dropdown-item" href="{{ route('conferences', $c->slug) }}">
                                    {{ $c->__('name') }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
