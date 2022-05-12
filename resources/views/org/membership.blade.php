@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto">
            <a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('home/home.header.navbar_li_membership')</h1>
        </div>
    </section>
    <section class="question" style="background: #fff!important;">
        <div class="quest m-auto">
            <div class="container">
                <div class="row">
                    <h3 class="ml-4">
                        {{ $membership->__('title') }}
                        @if ($membership->title === 'КАК ВСТУПИТЬ В СОТРУДНИЧЕСТВО С ТПП ТУРКМЕНИСТАНА?')
                            @if (app()->getLocale() === 'ru' || app()->getLocale() === null)
                                <a href="{{ asset('assets/front/application/Anketa_rus.docx') }}">
                                    <img src="{{ asset('images/word.png') }}" width="30px">
                                </a>
                            @elseif(app()->getLocale() === 'en')
                                <a href="{{ asset('assets/front/application/Anketa_eng.docx') }}">
                                    <img src="{{ asset('images/word.png') }}" width="30px">
                                </a>
                            @else
                                <a href="{{ asset('assets/front/application/Anketa_tm.docx') }}">
                                    <img src="{{ asset('images/word.png') }}" width="30px">
                                </a>
                            @endif
                        @endif
                    </h3><br><br>
                    <div class="col-lg-12 col-md-12 quest2">
                        {!! $membership->__('desc') !!}
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.quest -->
        </div>
    </section>
@endsection
