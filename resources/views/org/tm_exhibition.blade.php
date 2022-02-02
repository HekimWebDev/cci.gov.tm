@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('main.exh')</h1>
        </div>
    </section>
    <section class="blocks " style="background: none!important;">
        @foreach ($tm_ex as $x)
        @continue($x->__('title') == false)
            <div class="b3 m-auto">
                <div class="adv ">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-lg-2 col-sm-5 align-middle">
                                <img src="{{ $x->getImage() }}" style="width: 100%;" class="align-middle">
                            </div><!-- /.col-lg-2 -->
                            <div class="col-lg-5 col-sm-7  s2"><a href="#" style="cursor:auto;">
                                    <h3>{{ $x->__('title') }}</h3>
                                </a>
                                <p class="p1"></p>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-3 offset-lg-2 col-sm-3 s3"><a href="#" style="cursor:auto;">
                                    <h5>{{ $x->datesingle }}</h5>
                                    <!-- <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Kalendara bellemek</p> -->
                                </a></div><!-- /.col-lg-1 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        @endforeach
        <div class="ml-4">
            {{ $tm_ex->links() }}
        </div>
    </section>

@endsection
