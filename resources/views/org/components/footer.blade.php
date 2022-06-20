{{--<section class="footer-cont m-auto">--}}
{{--    <div class="footer-main m-auto">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 col-sm-6  mail">--}}
{{--                    &nbsp;--}}
{{--                </div><!-- /.col-md-6 -->--}}
{{--                <div class="col-md-6 col-sm-6 footer-search">--}}
{{--                    &nbsp;--}}
{{--                    <br>--}}
{{--                    &nbsp;--}}
{{--                </div><!-- /.col-md-6 -->--}}
{{--            </div><!-- /.row -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="footer-bottom ">--}}
{{--    <div class="footer-bot m-auto">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-md-6">--}}
{{--                    <h4>@lang('home/home.footer.TSSE')</h4>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-6 footer-media">--}}
{{--                    <p><a href="{{ route('abouts', 2) }}">@lang('home/home.header.navbar_li_about')</a>--}}
{{--                        <span>|</span>--}}
{{--                        <a href="{{ route('contacts') }}">@lang('home/home.footer.contact') </a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- /.row -->--}}
{{--    </div><!-- /.container -->--}}
{{--    </div><!-- /.footer-bot -->--}}
{{--</section>--}}

{{--<section class="last-footer">--}}
{{--    <div class="l-footer">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-sm-12 lf1">--}}
{{--                    <p>{{ date('Y') }} @lang('home/home.footer.policy')</p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-1 col-sm-4">--}}
{{--                    <p><a href="mailto:{{ $info[0]->email }}">{{ $info[0]->email }}</a></p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2 col-sm-4 text-center">--}}
{{--                    <p><a href="tel:+{{ $info[0]->phone }}">{{ $info[0]->phone }}</a></p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-sm-4">--}}
{{--                    <p>{{ $info[0]->__('adress') }}</p>--}}
{{--                </div>--}}
{{--            </div><!-- /.row -->--}}
{{--        </div><!-- /.container -->--}}
{{--        <div class="ftp"><img src="{{ asset('images/ftp.png') }}" alt=""></div>--}}
{{--    </div><!-- /.l-footer -->--}}
{{--</section><!-- Modal -->--}}

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body"><img src="" alt="Image" class="modal_image" style="width: 100%"></div>
        </div>
    </div>
</div>


<div class="mt-5 pt-5 pb-5 footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xs-12 about-company">
                <div class="row">
                    <div class="col-3"><img src="{{ asset('images/logo.png') }}"></div>
                    <div class="col-9 pt-2 pl-0"><h4>@lang('home/home.footer.TSSE')</h4></div>
                </div>

            </div>
            <div class="col-lg-3 col-xs-12 links">
                <h4 class="mt-lg-0 mt-sm-3">@lang('home/home.header.navbar_li_about')</h4>
                <ul class="m-0 p-0">
                    @foreach ($abouts as $about)
                    <li>- <a href="{{ route('abouts', $about->slug) }}">{{ $about->__('title') }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-xs-12 location">
               <a style="color: #d7d6d6" href="{{ route('contacts') }}"><h4 class="mt-lg-0 mt-sm-4">@lang('home/home.footer.contact')</h4> </a>
                <p><i class="fa fa-location-pin"></i>{{ $info[0]->__('adress') }}</p>
                <p><i class=""></i>{{ $info[0]->phone }}</p>
                <p><i class="fa fa-email"></i>{{ $info[0]->email }}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col copyright">
                <p class=""><small class="text-white-50">{{ date('Y') }} @lang('home/home.footer.policy')</small></p>
            </div>
        </div>
    </div>
</div>
