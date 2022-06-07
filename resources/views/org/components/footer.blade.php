<section class="footer-cont m-auto">
    <div class="footer-main m-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6  mail">
                    &nbsp;
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6 footer-search">
                    &nbsp;
                    <br>
                    &nbsp;
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div>
    </div>
</section>

<section class="footer-bottom ">
    <div class="footer-bot m-auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h4>@lang('home/home.footer.TSSE')</h4>
                </div>
                <div class="col-lg-6 col-md-6 footer-media">
                    <p><a href="{{ route('abouts', 2) }}">@lang('home/home.header.navbar_li_about')</a>
                        <span>|</span>
                        <a href="{{ route('contacts') }}">@lang('home/home.footer.contact') </a>
                    </p>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
    </div><!-- /.footer-bot -->
</section>

<section class="last-footer">
    <div class="l-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 lf1">
                    <p>{{ date('Y') }} @lang('home/home.footer.policy')</p>
                </div>
                <div class="col-lg-1 col-sm-4">
                    <p><a href="mailto:{{ $info[0]->email }}">{{ $info[0]->email }}</a></p>
                </div>
                <div class="col-lg-2 col-sm-4 text-center">
                    <p><a href="tel:+{{ $info[0]->phone }}">{{ $info[0]->phone }}</a></p>
                </div>
                <div class="col-lg-3 col-sm-4">
                    <p>{{ $info[0]->__('adress') }}</p>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="ftp"><img src="{{ asset('images/ftp.png') }}" alt=""></div>
    </div><!-- /.l-footer -->
</section><!-- Modal -->

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body"><img src="" alt="Image" class="modal_image" style="width: 100%"></div>
        </div>
    </div>
</div>
