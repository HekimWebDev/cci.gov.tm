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
                        <div class="col-md-4 col-xl-4 m1-photo text-center mb-4">
                            <div class="scale">
                                <a href="{{ route('news_single', $n->slug) }}">
                                    <div>
                                        <img src="{{ $n->getImage() }}" style="max-height:375px" class="scale img-fluid">
                                    </div>
                                    <p>{{ $n->__('title') }}</p>
                                    <span>{{ $n->updated_at}}</span>
                                </a>
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
