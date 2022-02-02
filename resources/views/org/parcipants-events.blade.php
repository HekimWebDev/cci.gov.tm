@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto">
            <p>@lang('main.main')</p>
            <h1>@lang('main.events')</h1>
        </div>
    </section>
    <section class="question">
        <div class="quest m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 quest2 pt-4">
                        {!! $parcipants[0]->__('desc') !!}
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.quest -->
    </section>
@endsection
