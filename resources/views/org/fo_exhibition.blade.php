@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('main.exh')</h1>
        </div>
    </section>
    <section class="blocks " style="background: none!important;">
        @foreach ($fo_ex as $x)
        @continue($x->__('title') == false)
            <div class="b3 m-auto">
                <div class="adv ">
                    <div class="container">
                        <div class="row">
                            <!-- /.col-lg-2 -->
                            <div class="col-lg-2 col-sm-5 align-middle">
                                <img src="{{ $x->getImage() }}" style="width: 100%;" class="align-middle">
                            </div>
                            <div class="col-lg-5 col-sm-7  s2">
                                <a href="#" style="cursor: auto;">
                                    <h3>{{ $x->__('title') }}</h3>
                                    @if($x->__('files'))
                                        <a href="{{ asset("uploads/".$x->__('files')) }}">Нажмите чтобы скачать файл</a>
                                    @endif
                                </a>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-3 offset-lg-2 col-sm-3 s3">
                                <a href="#" style="cursor: auto;">
                                    <h5>{{ $x->date }}</h5>
                                </a>
                            </div><!-- /.col-lg-1 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        @endforeach
        <div class="ml-4">
            {{ $fo_ex->links() }}
        </div>
    </section>
@endsection
