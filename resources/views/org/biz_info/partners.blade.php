@extends('org.layouts.layout')

@section('title', $title)

@section('content')

    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('home/home.header.navbar_li_a_partners')</h1>
        </div>
    </section>
    <section class="blocks " style="background: none!important;">

        @foreach ($partners as $partner)
            <div class="b3 m-auto">
                <div class="adv ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-sm-2 s1 " style="display: flex; align-items: center;">
                                <img src="{{ $partner->getImage() }}" width="250" height="130"
                                    style="height: auto !important;">
                            </div><!-- /.col-lg-2 -->
                            <div class="col-lg-5 col-sm-7  s2">
                                <h3>{{ $partner->__('name') }}</h3>
                                <p class="p1">{{ $partner->__('title') }}</p>
                                <p class="p2">
                                    @lang('tender/tender.phone') {{ $partner->phone }}<br>
                                    @isset($partner->faks)
                                        @lang('tender/tender.faks') {{ $partner->faks }}<br>
                                    @endisset
                                    @isset($partner->email)
                                        @lang('tender/tender.email') {{ $partner->email }} <br>
                                    @endisset
                                    @isset($partner->web)
                                        @lang('tender/tender.web') {{ $partner->web }}
                                    @endisset
                                </p>
                                <p class="p3">{{ $partner->__('adress') }}</p>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-3 offset-lg-2 col-sm-3 s3"><a href="#">
                                    <h5></h5>
                                    <!-- <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Kalendara bellemek</p> -->
                                </a></div><!-- /.col-lg-1 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        @endforeach

        <div class="offset-1">
            {{ $partners->links() }}
        </div>

    </section>

@endsection
