@extends('org.layouts.layout')

@section('title', $title)
@section('content')

    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('home/home.header.navbar_li_a_tm-offers')</h1>
        </div>
    </section>
    <section class="blocks " style="background: none!important;">

        @foreach ($tm_offers as $tm_offer)
            @continue($tm_offer->__('desc') == false)
            <div class="b3 m-auto">
                <div class="adv ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-sm-5 align-middle">
                                <img src="{{ $tm_offer->getImage() }}" style="width: 100%;" class="align-middle">
                            </div>
                            <div class="col-lg-5 col-sm-7  s2">
                                <h3>№{{ $tm_offer->number }} {{ $tm_offer->__('name') }}</h3>
                                <article>
                                    <div class="read-more js-read-more" data-rm-words="35">
                                        {!! $tm_offer->__('desc') !!}
                                    </div>
                                </article>
                                @if ($tm_offer->phone)
                                    <p class="mt-2"><strong>@lang('tender/tender.phone') </strong>{{ $tm_offer->phone }}</p>
                                @endif
                                @if ($tm_offer->faks)
                                    <p><strong>@lang('tender/tender.faks') </strong>{{ $tm_offer->faks }}</p>
                                @endif
                                @if ($tm_offer->email)
                                    <p><strong>@lang('tender/tender.email') </strong>{{ $tm_offer->email }}</p>
                                @endif
                                @if ($tm_offer->web)
                                    <p><strong>@lang('tender/tender.web') </strong>{{ $tm_offer->web }}</p>
                                @endif
                            </div>
                            <div class="col-lg-3 offset-lg-2 col-sm-3 s3">
                                <a href="#">
                                    <h5>{{ $tm_offer->datesingle }}</h5>
                                </a>
                            </div><!-- /.col-lg-1 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        @endforeach
        <div class="offset-1">
            {{ $tm_offers->links() }}
        </div>
    </section>

@endsection
