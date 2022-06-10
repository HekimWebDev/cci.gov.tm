@extends('org.layouts.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/owlcarousel/assets/owl.theme.default.min.css') }}">
@endpush

@section('title', $title)

@section('content')
    {{-- carousel banner --}}
    <div class="wrapper m-auto">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
            </ol>
            <div class="carousel-inner m-auto">
                @foreach ($carousels as $k => $v)
                    <div class="carousel-item @if ($k==1) active @endif">
                        <img class="d-block w-100" src="{{ asset('uploads') . '/' . $v->__('thumbnail') }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev m-auto" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next m-auto" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
            </a>
        </div><!-- /.container -->
    </div>

    {{-- news --}}
    <section class="news m-auto">
        <div class="news-main">
            <h1>@lang('home/home.news')</h1><a href="{{ route('news') }}">
                <p>@lang('home/home.news_small')</p>
            </a>
        </div>
    </section>
    <section class="main-photo" style="background-color: #f5f6fb;padding: 25px 0;">
        <div class="m-photo">
            <div class="container ">
                <div class="row">
                    @foreach ($news as $new)
                        @continue(($new->__('title') && $new->__('desc')) == false)
                        <div class="col-md-4 col-xl-4 col-lg-4 m1-photo text-center">
                            <div class="scale">
                                <a href="{{ route('news_single', $new->slug) }}">
                                    <div><img src="{{ $new->getImage() }}" class="scale img-fluid" alt=""></div>
                                    <p style="padding: 0" class="pt-2">{{ Str::words($new->__('title'), 6, '...') }}</p>
                                    <span>{{ $new->date }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
    </section>

    {{--NewsCci--}}
    <section class="news m-auto">
        <div class="news-main">
            <h1>@lang('home/home.news2')</h1>
            <a href="{{ route('news_cci') }}">
                <p>@lang('home/home.news_small')</p>
            </a>
        </div>
    </section>
    <section class="main-photo" style="background-color: #f5f6fb;padding: 25px 0;">
        <div class="m-photo">
            <div class="container ">
                <div class="row">
                    @foreach ($newsCci as $cci)
                        @continue(($cci->__('title') && $cci->__('desc')) == false)
                        <div class="col-md-4 col-xl-4 col-lg-4 m1-photo text-center">
                            <div class="scale">
                                <a href="{{ route('news_cci_single', $cci->slug) }}">
                                    <div><img src="{{ $cci->getImage() }}" class="scale img-fluid" alt=""></div>
                                    <p style="padding: 0" class="pt-2">{{ Str::words($cci->__('title'), 6, '...') }}</p>
                                    <span>{{ $cci->updated_at->format('d.m.Y') }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
    </section>

    {{-- reklamny banner --}}
    <section class="main-photo">
        <div class="m-photo">
            <div class="container ">
                <div class="row"></div><!-- /.row -->
            </div><!-- /.container -->
        </div>
    </section><!-- /.blocks -->
    <div class="banner m-auto text-center">
        <div class="wrapper m-auto">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner m-auto">
                    @foreach ($banner as $k => $v)
                        <div class="carousel-item @if ($k==0) active @endif">
                            <a href="
                            @if (app()->getLocale() === 'ru' || app()->getLocale() === null)
                            {{ asset('assets/admin/docs/Arza_ru.docx')}}
                            @elseif(app()->getLocale() === 'tk')
                            {{ asset('assets/admin/docs/Arza_tm.docx')}}
                            @endif">
                                <img class="d-block " height="330" width="100%"
                                     src="{{ asset('uploads') . '/' . $v->__('thumbnail') }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div><!-- /.container -->
        </div>
    </div><!-- /.banner -->

    <br>

    {{-- Gallery --}}
    <div class="content">
        <div class="rolls m-auto">
            <div class="news-main ">
                <h1>@lang('home/home.gallery')</h1>
            </div><!-- /.container -->
        </div>
        <br>
        <div class="site-section bg-left-half mb-5">
            <div class="container-fluid owl-2-style">
                <div class="owl-carousel owl-2" style="max-width: 1583px; margin-left: auto; margin-right: auto;">
                    @foreach ($galleries as $gallery)
                        <div class="media-29101">
                            <a href="{{ route('album_single', ['slug' => $gallery->slug]) }}"
                               @if ($gallery->album == null) style="pointer-events: none;" @endif>
                                <div class="img d-flex align-items-end justify-content-center" style="
                                        background-image:url({{ $gallery->getImage() }});
                                        height: 250px;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        background-size: cover;">
                                    <div class="w-100 h-30 text-center" style="
                                                background:rgba(0, 0, 0, 0) linear-gradient(to bottom,
                                                rgba(0, 0, 0, 0) 0px,
                                                rgba(0, 0, 0, 0.35) 20%,
                                                rgba(0, 0, 0, 0.44) 50%,
                                                rgba(0, 0, 0, 0.72) 70%,
                                                rgba(0, 0, 0, 0.82) 100%) repeat scroll 0 0;
                                                ;color:#ffffff">
                                        <h5>{{ $gallery->__('title') }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    {{--partners--}}
    <section class="">
        <div class="main m-auto">
            <h2>@lang('home/home.partners')</h2>
        </div>
        <div id="partners" class="container owl-carousel">

            @foreach ($partners as $partner)
                @continue($partner->thumbnail === null || $partner->is_show === 0)
                <div class="row align-items-center justify-content-center">
                    <div class="cub">
                        <div class="partner" style="height: 130px">
                            <div><img src="{{ $partner->getImage() }}" alt="">
                                <style>
                                    .partner div img {
                                        display: flex !important;
                                        width: 100% !important;
                                        padding: .5rem 0px;
                                        margin-left: 2.1rem;
                                    }
                                </style>
                            </div>
                        </div>
                    </div><!-- /.col-lg-2 -->
                </div>
            @endforeach
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        {{-- carousel gallery --}}
        <script>
            $(function() {
                if ($('.owl-2').length > 0) {
                    $('.owl-2').owlCarousel({
                        center: true,
                        items: 1,
                        loop: true,
                        stagePadding: 0,
                        margin: 5,
                        smartSpeed: 1000,
                        autoplay: true,
                        nav: true,
                        dots: true,
                        pauseOnHover: false,
                        responsive: {
                            600: {
                                margin: 5,
                                nav: true,
                                items: 2
                            },
                            1000: {
                                margin: 5,
                                stagePadding: 0,
                                nav: true,
                                items: 5
                            }
                        }
                    });
                }
            })
        </script>
    @endpush
@endsection
