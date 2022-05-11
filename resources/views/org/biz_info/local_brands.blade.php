@extends('org.layouts.layout')
<style>
    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .row > div[class*='col-'] {
        display: flex;
    }

</style>
@section('title', $title)

@section('content')

    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>Ýerli brendler</h1>
        </div>
    </section>

    <section class="blocks " style="background: none!important;">
        <div class="container">
            <div class="row text-center">
                @foreach($brands as $brand)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <img class="img-fluid mb-5 mt-2" src="{{ $brand->getImage() }}" alt="Card image cap">
                            <div class="card-block">
                                <h4 class="card-title mb-3">{{ $brand->__('title') }}</h4>
                                <p class="card-text mt-2 mb-4">{{ $brand->__('article') }}</p>
                                <p class="card-text"><small class="text-muted">{{ $brand->created_at }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection
