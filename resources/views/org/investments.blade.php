@extends('org.layouts.layout')

@section('title', $title)
@section('content')
    <section class="news1 m-auto">
        <div class="news-main1 m-auto">
            <p>@lang('main.main')</p>
            <h1>{{ $investment->__('name') }}</h1>
        </div>
    </section>
    <section class="question" style="background: #fff!important;">
        <div class="quest m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 quest2 pt-4">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <p>{!! $investment->__('desc') !!}</p>
                        @if ($investment->is_form)

                            <div id="row justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 ml-lg-4 pl-lg-4 pt-4">
                                    <form method="POST" id="my-form" role="form" action="{{ route('form.store') }}">
                                        @csrf
                                        <input type="hidden" name="info" value="{{ $investment->name }}">
                                        <div class="form-group">
                                            <p class="p-0 m-0"><label for="email">Email:</label></p>
                                            <input name="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror" id="email"
                                                   placeholder="name@example.com" required>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <p class="p-0 m-0"><label for="theme">Тема:</label></p>
                                            <input name="theme" type="text"
                                                   class="form-control @error('theme') is-invalid @enderror" id="theme"
                                                   required>
                                            @error('theme')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <p class="p-0 m-0"><label for="message">Сообщение:</label></p>
                                            <textarea name="message"
                                                      class="form-control @error('message') is-invalid @enderror"
                                                      id="message"
                                                      rows="4" required></textarea>
                                            @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">@lang('inv/inv.button')</button>
                                    </form>
                                </div>
                            </div>

                        @endif
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.quest -->
        </div><!-- /.quest -->
    </section><!-- /.question -->

@endsection
