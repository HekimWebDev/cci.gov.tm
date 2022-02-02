@extends('org.layouts.layout')

@section('title', $title)
@section('content')

    @if ($news->__('title') && $news->__('desc'))
        <section class="news1 m-auto">
            <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('inv/inv.route1')</a>
                <h1>@lang('home/home.news')</h1>
            </div>
        </section>
        <section class="last-news mt-4 mb-4">
            <div class="lnews m-auto">
                <h4 class="ml-4">{{ $news->__('title') }}</h4><br>
            </div>
        </section>
        <section class="tsse">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 tpp">
                        <img src="{{ $news->getImage() }}" style="width: 24%; float: left; margin-right: 15px;">
                        {!! $news->__('desc') !!}
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
    @else
    <script>window.location = "/new/news";</script>
    @endif

@endsection
