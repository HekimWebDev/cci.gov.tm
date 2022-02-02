@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('home/home.header.navbar_li_a_fo-offers')</h1>
        </div>
    </section>
    <section class="blocks " style="background: none!important;">

        @foreach ($fo_offers as $fo_offer)
        @continue($fo_offer->__('desc') == false)
            <div class="b3 m-auto">
                <div class="adv ">
                    <div class="container">
                        <div class="row">
                            <!-- /.col-lg-2 -->
                            <div class="col-lg-2 col-sm-5 align-middle">
                                <img src="{{ $fo_offer->getImage() }}" alt="" style="width: 100%;" class="align-middle">
                            </div>
                            <div class="col-lg-5 col-sm-7  s2">
                                <h3>№{{ $fo_offer->number }} {{ $fo_offer->__('name') }}</h3>
                                <p class="p1">
                                <article>
                                    <div class="read-more js-read-more" data-rm-words="25">
                                        {!! $fo_offer->__('desc') !!}
                                    </div>
                                </article>
                                <p>
                                    @if ($fo_offer->phone)
                                        <strong>@lang('tender/tender.phone') </strong>{{ $fo_offer->phone }} <br>
                                    @endif
                                    @if ($fo_offer->faks)
                                        <strong>@lang('tender/tender.faks') </strong>{{ $fo_offer->faks }} <br>
                                    @endif
                                    @if ($fo_offer->email)
                                        <strong>@lang('tender/tender.email') </strong>{{ $fo_offer->email }} <br>
                                    @endif
                                    @if ($fo_offer->web)
                                        <strong>@lang('tender/tender.web')</strong>{{ $fo_offer->web }}
                                    @endif
                                </p>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-3 offset-lg-2 col-sm-3 s3"><a href="#">
                                    <h5>{{ $fo_offer->datesingle }}</h5>
                                    <!-- <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Kalendara bellemek</p> -->
                                </a></div><!-- /.col-lg-1 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        @endforeach
        <div class="offset-1">
            {{ $fo_offers->links() }}
        </div>
    </section>
@endsection
