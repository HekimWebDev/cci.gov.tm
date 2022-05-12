@extends('org.layouts.layout')

@section('title', $title)

@section('content')

    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('main.brands')</h1>
        </div>
    </section>

    <section class="blocks " style="background: none!important;">
        <div class="container">
            <div class="row-div text-center">
                @foreach($brands as $brand)
                    @continue(($brand->__('title') && $brand->__('article')) === false)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <img class="img-fluid mb-5 mt-2" src="{{ $brand->getImage() ?? '' }}">
                            <div class="card-block">
                                <h4 class="card-title mb-3">{{ $brand->__('title') }}</h4>
                                <p class="card-text mt-2 mb-4">{{ $brand->__('article') }}</p>
                                <p class="card-text"><small class="text-muted">{{ $brand->created_at }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $brands->links()  }}
        </div>
    </section>

@endsection
