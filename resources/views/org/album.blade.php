@extends('org.layouts.layout')

@push('scripts')
    <link rel="stylesheet" href="{{ asset('assets/lib/ekko-lightbox/ekko-lightbox.css') }}">
@endpush

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
                    <a target="_blank" href="{{ asset('uploads/'.$a) }}" data-toggle="lightbox"
                        data-gallery="example-gallery">
                        <img src="{{ asset('uploads/'.$a) }}" class="img-fluid " alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/lib/ekko-lightbox/ekko-lightbox.js') }}"></script

        {{-- ekko-lightbox --}}
        <script>
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>
    @endpush

@endsection
