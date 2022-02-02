@extends('org.layouts.layout')
@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>{{ $about->__('title') }}</h1>
        </div>
    </section>
    <section class="tsse">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 tpp" style="padding: 40px">
                    <p>
                        {!! $about->__('desc') !!}
                    </p>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
        </div>
    </section>

@endsection
