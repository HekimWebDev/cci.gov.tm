@extends('org.layouts.layout')
@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.main')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('main.album')</li>
            </ol>
        </nav>
        <div class="news-main1 m-auto">
            <h4>{{ $gallery->__('title') }}</h4>
        </div>
    </section>
    <div class="container">
        <div class="row">
            @foreach ($album as $a)
                <div class="col-sm-3 col-lg-4" style="padding: 2px">
                    <a target="_blank" href="/public/uploads/{{ $a }}" data-toggle="lightbox"
                        data-gallery="example-gallery">
                        <img src="/public/uploads/{{ $a }}" class="img-fluid " alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
