<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="yandex-verification" content="3293d0c0b9b4b984"/>
    <meta name="google-site-verification" content="e9gmroTEEMFbjLN6lvx3dubQnATGPza6Fx4kRIW2xZc"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="alternate" hreflang="en" href="{{ route('home') }}/locale/en">
    <link rel="alternate" hreflang="tkm" href="{{ route('home') }}/locale/tk">

    <link rel="stylesheet" href="{{ asset('assets/front/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap-4.6/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free/css/all.min.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/ckeditor-style.css') }}">

    <title>@yield('title')</title>

    @stack('styles')

    <style>
        .breadcrumb-dot .breadcrumb-item + .breadcrumb-item::before {
            content: "•";
            color: #408080;
        }

        .read-more {
            margin-bottom: 0.5em;
            margin-top: 1.5em;

        &
        __link-wrap {
            display: block;
        }

        &
        __link {
            font-weight: 700;
        }

        }

        .read-more.is-inline,
        .read-more.is-inline p,
        .read-more.is-inline + span {
            display: inline;
        }

        .read-more.is-inline + span {
            margin-left: 0.25em
        }

        .read-more.is-inline.is-expanded + span {
            display: inline-block;
            margin-left: 0;
        }

        .read-more__link {
            margin-bottom: 10px;
        }

        .row-div {
            display: flex;
            flex-wrap: wrap;
        }

        .row-div > div[class*='col-'] {
            display: flex;
        }
    </style>

    <style>
        .footer {
            background: #01589c;
            color: #d7d6d6;
        }
        .footer .links ul {
            list-style-type: none;
        }
        .footer .links li a {
            color: white;
            transition: color 0.2s;
        }
        .footer .links li a:hover {
            text-decoration: none;
            color: #4180CB;
        }
        .footer .about-company i {
            font-size: 25px;
        }
        .footer .about-company a {
            color: white;
            transition: color 0.2s;
        }
        .footer .about-company a:hover {
            color: #4180CB;
        }
        .footer .location i {
            font-size: 18px;
        }
        .footer .copyright p {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>

@include('org.components.header')

@yield('content')

@include('org.components.footer')

<script src="{{ asset('assets/lib/jquery/jquery-3.3.1.min.js') }}"></script>

<script src="{{ asset('assets/lib/bootstrap/js/bootstrap.js') }}"></script>

<script src="{{ asset('assets/front/js/main1.js') }}"></script>


@stack('scripts')


{{--     ekko-lightbox --}}
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>


</body>

</html>
