<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="yandex-verification" content="3293d0c0b9b4b984" />
    <meta name="google-site-verification" content="e9gmroTEEMFbjLN6lvx3dubQnATGPza6Fx4kRIW2xZc" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="alternate" hreflang="en" href="{{ route('home') }}/locale/en">
    <link rel="alternate" hreflang="tkm" href="{{ route('home') }}/locale/tk">

    <link rel="stylesheet" href="{{ asset('assets/front/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap-4.6/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free/css/all.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css" /><link rel="stylesheet" type="text/css" href="slick/slick-theme.css" /> -->
    <link rel="stylesheet" href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/ckeditor-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/ekko-lightbox/ekko-lightbox.css') }}">
    <title>@yield('title')</title>
    {{-- <script src="//code.jivosite.com/widget/A1kOdRiXYs" async></script> --}}
    <script src="//code-ya.jivosite.com/widget/48kN4sKNpf" async></script>

    <style>
        .breadcrumb-dot .breadcrumb-item+.breadcrumb-item::before {
            content: "•";
            color: #408080;
        }

        .read-more {
            margin-bottom: 0.5em;
            margin-top: 1.5em;
            &__link-wrap {
                display: block;
            }

            &__link {
                font-weight: 700;
            }
        }

        .read-more.is-inline,
        .read-more.is-inline p,
        .read-more.is-inline+span {
            display: inline;
        }

        .read-more.is-inline+span {
            margin-left: 0.25em
        }

        .read-more.is-inline.is-expanded+span {
            display: inline-block;
            margin-left: 0;
        }

        .read-more__link{
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
</head>

<body>
    <header>
        <div class="top-header m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 top-1">
                        <p>@lang('home/home.header.navbar_contact'):
                            <a href="tel:+{{ $info[0]->phone }}">{{ $info[0]->phone }}</a>
                        </p>
                    </div><!-- /.col-lg-3 -->
                    <div class="col-md-7 col-lg-7 ml-auto top-2 ">
                        <p>
                            <a href="{{ route('contacts') }}">@lang('home/home.header.contacts')</a>
                            <span>|</span>
                            <span style="font-size: 13px;padding-left: 0px!important;">
                                @lang('home/home.header.select_lang')</span>
                            <a href="{{ route('locale', 'tk') }}"><img src="{{ asset('images/tm.png') }}"
                                    alt=""></a>
                            <a href="{{ route('locale', 'en') }}"><img src="{{ asset('images/en.png') }}"
                                    alt=""></a>
                            <a href="{{ route('locale', 'ru') }}"><img src="{{ asset('images/ru.png') }}"
                                    alt=""></a>
                        </p>
                    </div><!-- /.col-lg-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top-header -->
        <div class="header ">
            <nav class="navbar navbar-expand-lg navbar-light m-auto ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}">
                    <span class="word" style="text-transform: uppercase">@lang('home/home.header.navbar')</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        {{-- About --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">@lang('home/home.header.navbar_li_about')</a>
                            <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($abouts as $about)
                                    <a class="dropdown-item"
                                        href="{{ route('abouts', $about->slug) }}">{{ $about->__('title') }}</a>
                                @endforeach
                            </div>
                        </li>
                        {{-- Membership --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home/home.header.navbar_li_membership')</a>
                            <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($memberships as $membership)
                                    <a class="dropdown-item" href="{{ route('membership', $membership->slug) }}">
                                        @if ($membership->title == 'КАК ВСТУПИТЬ В СОТРУДНИЧЕСТВО С ТПП ТУРКМЕНИСТАНА?')
                                            @lang('home/home.header.navbar_li_a_joining')
                                        @else
                                            {{ Str::ucfirst(Str::lower($membership->__('title'))) }}
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </li>

                        {{-- Business info --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home/home.header.navbar_li_business_info')</a>
                            <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item"
                                    href="{{ route('biz-info.tenders') }}">@lang('home/home.header.navbar_li_a_tenders')</a>
                                <a class="dropdown-item"
                                    href="{{ route('biz-info.partners') }}">@lang('home/home.header.navbar_li_a_partners')</a>
                                <a class="dropdown-item"
                                    href="{{ route('biz-info.tm-offers') }}">@lang('home/home.header.navbar_li_a_tm-offers')</a>
                                <a class="dropdown-item"
                                    href="{{ route('biz-info.fo-offers') }}">@lang('home/home.header.navbar_li_a_fo-offers')</a>
                                <a class="dropdown-item"
                                    href="{{ route('biz-info.local-brands') }}">@lang('main.brands')</a>
                                <a class="dropdown-item"
                                    href="{{ route('biz-info.position') }}">@lang('main.position')</a>
                            </div>
                        </li>

                        {{-- Investments --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home/home.header.navbar_li_investment_activity')</a>
                            <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($investments as $investment)
                                    <a class="dropdown-item" href="{{ route('investment', $investment->slug) }}">
                                        {{ $investment->__('name') }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        {{-- Exhibition --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home/home.header.navbar_li_exhibition')</a>
                            <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('tm-exhibition') }}">
                                    @lang('home/home.header.navbar_li_a_tm-exhibition')
                                </a>
                                <a class="dropdown-item" href="{{ route('fo-exhibition') }}">
                                    @lang('home/home.header.navbar_li_a_fo-exhibitions')
                                </a>
                                <a class="dropdown-item" href="{{ route('parcipants') }}">
                                    @lang('home/home.header.navbar_li_a_parcipants-events')
                                </a>
                            </div>
                        </li>
                        {{-- Baranches --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home/home.header.navbar_li_enterprises')</a>
                            <div class="dropdown-menu header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($branches as $branch)
                                    <a class="dropdown-item" href="{{ route('branch', $branch->slug) }}">
                                        {{ $branch->__('name') }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        {{-- Conferens --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('home/home.header.navbar_li_conferences')</a>
                            <div class="dropdown-menu dropdown-menu-right header_dropdown_menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($conf as $c)
                                    <a class="dropdown-item" href="{{ route('conferences', $c->slug) }}">
                                        {{ $c->__('name') }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

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

    <script src="{{ asset('assets/lib/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- <script src="slick/slick.min.js"></script> -->
    <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/main1.js') }}"></script>
    <script src="{{ asset('assets/lib/readmore.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-validation/jquery.form.js') }}"></script>

    <script src="{{ asset('assets/lib/ekko-lightbox/ekko-lightbox.js') }}"></script>
    {{-- ekko-lightbox --}}
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
    {{-- <script>
        $(this).ekkoLightbox({
            alwaysShowClose: true,
            onShown: function() {
                console.log('Checking our the events huh?');
            },
            onNavigate: function(direction, itemIndex)
            console.log(lowOrHi);
        }
        });
    </script> --}}

    {{-- Validation --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

        $("#my-form").validate({
            rules: {
                email: {
                    required: true,
                    minlength: 3,
                    maxlength: 255,
                    email: true,
                },
                theme: {
                    required: true,
                    minlength: 3,
                    maxlength: 255,
                },
                message: {
                    minlength: 5,
                    required: true,
                },
            },
            messages: {
                email: {
                    required: "Это поле необходимо заполнить.",
                    email: "Пожалуйста, введите корректный адрес электронной почты.",
                    maxlength: $.validator.format("Пожалуйста, введите не больше {0} символов."),
                },
                theme: {
                    required: "Это поле необходимо заполнить.",
                    minlength: $.validator.format("Пожалуйста, введите не меньше {0} символов."),
                    maxlength: $.validator.format("Пожалуйста, введите не больше {0} символов."),
                },
                message: {
                    required: "Это поле необходимо заполнить.",
                    minlength: $.validator.format("Пожалуйста, введите не меньше {0} символов."),
                },
            },
            validClass: "is-valid",
            // errorElement: "div",
            errorClass: "is-invalid text-danger",
            submitHandler: function(form) {
                alert('Ваша собшение успешно сохранился');
                $(form).ajaxSubmit();
                $(form).clearForm();
            }
        });
    </script>

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
    {{-- readmore js --}}

    <script>
/**
 *  Read More JS
 *  truncates text via specfied character length with more/less actions.
 *  Maintains original format of pre truncated text.
 *  @author stephen scaff
 *  @todo   Add destroy method for ajaxed content support.
 *
 */
 const ReadMore = (() => {
   let s;

   return {

     settings() {
       return {
         content: document.querySelectorAll('.js-read-more'),
         originalContentArr: [],
         truncatedContentArr: [],
         moreLink: "@lang('main.read_more')",
         lessLink: "@lang('main.read_more_close')",
       }
     },

     init() {
       s = this.settings();
       this.bindEvents();
     },

     bindEvents() {
       ReadMore.truncateText();
     },

     /**
      * Count Words
      * Helper to handle word count.
      * @param {string} str - Target content string.
      */
     countWords(str) {
       return str.split(/\s+/).length;
     },

     /**
      * Ellpise Content
      * @param {string} str - content string.
      * @param {number} wordsNum - Number of words to show before truncation.
      */
     ellipseContent(str, wordsNum) {
       return str.split(/\s+/).slice(0, wordsNum).join(' ') + '...';
     },

     /**
      * Truncate Text
      * Truncate and ellipses contented content
      * based on specified word count.
      * Calls createLink() and handleClick() methods.
      */
     truncateText() {

       for (let i = 0; i < s.content.length; i++) {
         //console.log(s.content)
         const originalContent = s.content[i].innerHTML;
         const numberOfWords = s.content[i].dataset.rmWords;
         const truncateContent = ReadMore.ellipseContent(originalContent, numberOfWords);
         const originalContentWords = ReadMore.countWords(originalContent);

         s.originalContentArr.push(originalContent);
         s.truncatedContentArr.push(truncateContent);

         if (numberOfWords < originalContentWords) {
           s.content[i].innerHTML = s.truncatedContentArr[i];
           let self = i;
           ReadMore.createLink(self)
         }
       }
       ReadMore.handleClick(s.content);
     },

     /**
      * Create Link
      * Creates and Inserts Read More Link
      * @param {number} index - index reference of looped item
      */
     createLink(index) {
       const linkWrap = document.createElement('span');

       linkWrap.className = 'read-more__link-wrap';

       linkWrap.innerHTML = `<a id="read-more_${index}"
                                class="read-more__link"
                                style="cursor:pointer;">
                                ${s.moreLink}
                            </a>`;

       // Inset created link
       s.content[index].parentNode.insertBefore(linkWrap, s.content[index].nextSibling);

     },

     /**
      * Handle Click
      * Toggle Click eve
      */
     handleClick(el) {
       const readMoreLink = document.querySelectorAll('.read-more__link');

       for (let j = 0, l = readMoreLink.length; j < l; j++) {

         readMoreLink[j].addEventListener('click', function() {

           const moreLinkID = this.getAttribute('id');
           let index = moreLinkID.split('_')[1];

           el[index].classList.toggle('is-expanded');

           if (this.dataset.clicked !== 'true') {
              el[index].innerHTML = s.originalContentArr[index];
              this.innerHTML = s.lessLink;
              this.dataset.clicked = true;
           } else {
             el[index].innerHTML = s.truncatedContentArr[index];
             this.innerHTML = s.moreLink;
             this.dataset.clicked = false;
           }
         });
       }
     },

     /**
      * Open All
      * Method to expand all instances on the page.
      * Will probably be useful with a destroy method.
      */
     openAll() {
       const instances = document.querySelectorAll('.read-more__link');
         for (let i = 0; i < instances.length; i++) {
           content[i].innerHTML = s.truncatedContentArr[i];
           instances[i].innerHTML = s.moreLink;
         }
       }
     }
 })();


//export default ReadMore;

ReadMore.init();
    </script>
</body>

</html>
