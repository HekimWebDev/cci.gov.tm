@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="/ru/" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('home/home.news')</h1>
        </div>
    </section>
    <section class="last-news">
        <div class="lnews m-auto">
            <h1>@lang('home/home.last')</h1>
        </div>
    </section>
    <section class="main-photo">
        <div class="m-photo">
            <div class="container ">
                <div class="row">
                    @foreach ($news as $n)
                        @continue(($n->__('title') && $n->__('desc')) == false)
                        <div class="col-4">
                            <div class="card m-2">
                                <img class="card-img-top" src="{{ $n->getImage() }}" alt="Card image cap">
                                <div class="card-body" style="height: 160px">
                                    <a href="{{ route('news_single', $n->slug) }}">
                                        <p class="card-text text-dark">{{ $n->__('title') }}</p>
                                    </a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $n->publish_at }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- /.row -->
                <div class="mt-3">
                    {{ $news->links() }}
                </div>
            </div><!-- /.container -->
        </div>
    </section>
@endsection
