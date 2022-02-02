@extends('org.layouts.layout')

@section('title', $title)
@section('content')

    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('home/home.header.navbar_li_a_tenders')</h1>
        </div>
    </section>
    <section class="blocks " style="background: none!important;">
        @foreach ($tenders as $tender)
            @continue(($tender->__('title') && $tender->__('desc')) == false)
            <div class="b3 m-auto">
                <div class="adv ">
                    <div class="container">
                        <div class="row">
                            <!-- /.col-lg-2 -->
                            <div class="col-lg-11 col-sm-10 col-md-10  s2">
                                <h3>{{ $tender->__('title') }}</h3>
                                <h5 class="mt-3 text-danger">{{ $tender->getTenderDate() }}</h5>

                                <article>
                                    <div class="read-more js-read-more" data-rm-words="35">
                                        {!! $tender->__('desc') !!}
                                    </div>
                                </article>

                                <p class="mt-3"><strong>@lang('tender/tender.info')</strong></p>
                                @isset($tender->phone)
                                    <p><strong>@lang('tender/tender.phone')</strong> {{ $tender->phone }}</p>
                                @endisset
                                @isset($tender->faks)
                                    <p><strong>@lang('tender/tender.faks')</strong> {{ $tender->faks }}</p>
                                @endisset
                                @isset($tender->adress)
                                    <p><strong>@lang('tender/tender.adress')</strong> {{ $tender->__('adress') }}</p>
                                @endisset
                                @isset($tender->email)
                                    <p><strong>@lang('tender/tender.email')</strong> {{ $tender->email }}</p>
                                @endisset
                                @isset($tender->web)
                                    <p><strong>@lang('tender/tender.web')</strong> {{ $tender->web }}</p>
                                @endisset
                                @isset($tender->organizer)
                                    <p class="p2">@lang('tender/tender.org')</p>
                                @endisset
                                <p class="p3">{{ $tender->__('organizer') }}</p>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-3 offset-lg-2 col-sm-3 s3"></div><!-- /.col-lg-1 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        @endforeach
        <div class="offset-1">
            {{ $tenders->links() }}
        </div>
    </section>

@endsection
