@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto">
            <a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('main.baranches')</h1>
        </div>
    </section>
    <section class="question" style="background: #fff!important;">
        <div class="quest m-auto">
            <div class="container">
                <div class="row">
                    <h3 class="ml-4">
                        {{ $branch->__('title') }}
                    </h3>
                    <div class="col-lg-12 col-md-12 quest2">
                        {!! $branch->__('desc') !!}
                        <strong>@lang('tender/tender.adress') </strong>{{ $branch->__('adress') }} <br>
                        @if ($branch->phone)
                            <strong>@lang('tender/tender.phone') </strong>{{ $branch->phone }} <br>
                        @endif
                        @if ($branch->faks)
                            <strong>@lang('tender/tender.faks')</strong>{{ $branch->faks }} <br>
                        @endif
                        @if ($branch->email)
                            <strong>@lang('tender/tender.email') </strong>{{ $branch->email }} <br>
                        @endif
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div>
    </section>
@endsection
