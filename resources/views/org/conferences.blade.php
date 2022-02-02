@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>{{ $conf->__('title') }}</h1>
        </div>
    </section>
    <section class="tsse">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 tpp">
                    {!! $conf->__('desc') !!}
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <section class="tsse mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 tpp">
                    {!! $conf->__('content') !!}
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
