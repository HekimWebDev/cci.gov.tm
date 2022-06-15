@extends('org.layouts.layout')
@section('title', $title)
@section('content')
    <section class="contactus">
        <div class="container">
            <div class="row justify-content-center align-items-center d-f">
                <div class="col-lg-8 cont2">
                    <div class="c1">
                        <p>@lang('main.contacts.adress')</p>
                        <h3>{{ $address[0]->__('adress') }}</h3>
                    </div>
                    @foreach ($contacts as $contact)
                        <div class="row r1 text-white" style="background-color: #01589d">
                            <div class="col-lg-12 col-12 cnt1" style="padding-bottom:0px;">
                                <h4>{{ $contact->__('name') }}</h4>
                            </div>
                            <div class="col-lg-6 cnt1">
                                <p>@lang('main.contacts.phone')</p>
                                <h3>{{ $contact->phone }}</h3>
                            </div>
                            <div class="col-lg-6 cnt1">
                                <p>@lang('main.contacts.faks')</p>
                                <h3>{{ $contact->faks }}</h3>
                            </div>
                            <div class="col-lg-6 cnt1">
                                <p>@lang('main.contacts.email')</p>
                                <h3>{{ $contact->email }}</h3>
                            </div>
                        </div>
                    @endforeach
                    <div class="row r2">
                        <div class="col-lg-6 cnt2">
                            <p>@lang('main.contacts.web')</p>
                            <h3>www.cci.gov.tm</h3>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section>
    <div class="map" style="width: 100%"><iframe
            src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac5c732217e7c088b2cd997bc68dfe6af30f2383d6556a4b6d9d38d7647eb0a41&amp;source=constructor"
            width="100%" height="400" frameborder="0"></iframe></div>
@endsection
