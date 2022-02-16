<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free/css/all.css') }}">--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('assets/lib/daterangepicker-master/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/ckeditot-style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/breadcrumbs.css') }}">
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#"
                   role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <div class="ml-4 row">
            <a href="https://app.jivosite.com/chat/inbox" target="_blank" class="btn btn-success mr-2">Jiva chat</a>
            <a href="{{ route('home') }}" class="btn btn-info mr-2">На сайт</a>
            <a href="{{ route('logout') }}" class="btn btn-danger"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Выйти
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a class="btn btn-primary" href="{{ url('/') }}" role="button">На сайт</a>
                    <a class="btn btn-primary" href="{{ url('https://app.jivosite.com/chat/inbox') }}"
                       role="button">Jiva chat</a>
                    {{-- <a href="#" class="d-block">Панель администратора</a> --}}
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная</p>
                        </a>
                    </li>
                    {{-- Новасти --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Новости<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('news.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список новостей</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('news.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить новость</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Новости ТППT --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Новости ТППT<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('news_cci.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список новостей</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('news_cci.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить новость</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Галерея --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Галерея<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('galleries.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список изображений</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('galleries.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить изображение</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Karusel banner --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Карусельные баннеры<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('carousels.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список изображений</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('carousels.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить изображение</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Reklamny banner --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Рекламный баннер <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('banners.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список баннеров </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('banners.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить баннера</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Тендеры --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Тендеры<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('tenders.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список тендеров</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tenders.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить новый тендер</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Партнеры --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Партнеры<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('partners.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список партнеров</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('partners.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новые партнеры</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Туркменские предложении --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Тм предложения<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('tm_offers.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список предложений</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tm_offers.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить предложение</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Inostrannyye predlozheniye --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Иност. предложения<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('fo_offers.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список предложений</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('fo_offers.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить предложение</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Вопросы --}}
                    <li class="nav-item has-treeview">
                        <a href="{{ route('form.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Вопросы по анкетам</p>
                        </a>
                    </li>
                    {{-- Tm exhibition --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Выставки в Тм<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('tm_exhibitions.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список выставок</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tm_exhibitions.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить выстовки</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Fo-exhbition --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Выставки за рубежом<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('fo_exhibitions.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список выставок</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('fo_exhibitions.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить выстовки</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- uchastnikam merepriyatii --}}
                    <li class="nav-item has-treeview">
                        <a href="{{ route('parcipants_events.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Участникам мер-й</p>
                        </a>
                    </li>
                    {{-- branches --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Предприятие<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('branches.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список педприятии</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('branches.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить предприятию</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- contacts --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>Контакты<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('contacts.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список контакты</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contacts.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить контакты</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Information --}}
                    <li class="nav-item has-treeview">
                        <a href="{{ route('informations.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-info-circle"></i>
                            <p>Информация</p>
                        </a>
                    </li>
                    {{-- About us --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>Страницы "о нас"<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('abouts.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список страниц</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('abouts.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить страницу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Membership --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>Страницы "о членстве"<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('memberships.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список страниц</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('memberships.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить страницу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Investment --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>Страницы "Инвестиции"<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('investments.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список страниц</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('investments.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить страницу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>Стр. "Конференции"<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('conferences.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список страниц</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('conferences.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить страницу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12 text-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script src="{{ asset('assets/lib/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('assets/lib/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/lib/daterangepicker-master/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>
<script src="{{ asset('assets/lib/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/lib/jquery-validation/jquery.form.js') }}"></script>
<script src="{{ asset('assets/lib/jquery-validation/jquery-validation-bootstrap-tooltip.js') }}"></script>
{{-- ckeditor --}}
<script>
    // ru
    ClassicEditor
        .create(document.querySelector('#desc'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                    'imageStyle:alignRight', '|', 'resizeImage',
                ],

                styles: [
                    // Эта опция равна ситуации, когда стиль не применяется.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]

            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed',
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
    // .catch(function(error) {
    //     console.error(error);
    // });

    // en
    ClassicEditor
        .create(document.querySelector('#desc_en'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                    'imageStyle:alignRight', '|', 'resizeImage',
                ],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
    // .catch(function(error) {
    //     console.error(error);
    // });
    // tk
    ClassicEditor
        .create(document.querySelector('#desc_tk'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                    'imageStyle:alignRight', '|', 'resizeImage',
                ],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
    // .catch(function(error) {
    //     console.error(error);
    // });
</script>
<script>
    // ru
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                    'imageStyle:alignRight', '|', 'resizeImage',
                ],

                styles: [
                    // Эта опция равна ситуации, когда стиль не применяется.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]

            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed',
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
    // .catch(function(error) {
    //     console.error(error);
    // });

    // en
    ClassicEditor
        .create(document.querySelector('#content_en'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                    'imageStyle:alignRight', '|', 'resizeImage',
                ],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
    // .catch(function(error) {
    //     console.error(error);
    // });
    // tk
    ClassicEditor
        .create(document.querySelector('#content_tk'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                    'imageStyle:alignRight', '|', 'resizeImage',
                ],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
    // .catch(function(error) {
    //     console.error(error);
    // });
</script>

{{-- daterangepicker --}}
<script type="text/javascript">
    $(function () {

        $('input[id="date"]').daterangepicker({
            autoUpdateInput: false,
            // locale: {
            //     cancelLabel: 'Clear'
            // }
            "locale": {
                "format": "MM.DD.YYYY",
                "separator": " - ",
                "applyLabel": "Ок",
                "cancelLabel": "Отмена",
                "fromLabel": "От",
                "toLabel": "До",
                "customRangeLabel": "Произвольный",
                "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                firstDay: 1
            }
        });

        $('input[id="date"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format(
                'DD.MM.YYYY'));
        });

        $('input[id="date"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });
</script>
<script>
    $('#datemask').inputmask('dd.mm.yyyy', {
        'placeholder': 'dd.mm.yyyy'
    });
    $('[data-mask]').inputmask()
</script>

{{-- collaps navbar --}}
<script>
    $('.nav-sidebar a').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if (link == location) {
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });

    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

{{-- js view image --}}
<script>
    $('#thumbnail').change(function () {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log('ошибка, не изображение');
            }
        } else {
            console.log('хьюстон у нас проблема');
        }
    });

    $('#reset-img-preview').click(function () {
        $('#thumbnail').val('');
        $('#img-preview').attr('src', '');
    });

    $('#form').bind('reset', function () {
        $('#img-preview').attr('src', 'default-preview.jpg');
    });
</script>
{{-- en --}}
<script>
    $('#thumbnail_en').change(function () {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-preview_en').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log('ошибка, не изображение');
            }
        } else {
            console.log('хьюстон у нас проблема');
        }
    });

    $('#reset-img-preview').click(function () {
        $('#thumbnail_en').val('');
        $('#img-preview').attr('src', '');
    });

    $('#form').bind('reset', function () {
        $('#img-preview').attr('src', 'default-preview.jpg');
    });
</script>
{{-- tk --}}
<script>
    $('#thumbnail_tk').change(function () {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-preview_tk').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log('ошибка, не изображение');
            }
        } else {
            console.log('хьюстон у нас проблема');
        }
    });

    $('#reset-img-preview').click(function () {
        $('#thumbnail_tk').val('');
        $('#img-preview').attr('src', '');
    });

    $('#form').bind('reset', function () {
        $('#img-preview').attr('src', 'default-preview.jpg');
    });
</script>
{{-- multipl --}}
<script>
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {
            // Only process image files.
            if (!f.type.match('image.*')) {
                alert("Image only please....");
            }
            var reader = new FileReader();
            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="img-thumbnail" width="200" title="', escape(theFile
                        .name), '" src="', e
                        .target.result, '" />'
                    ].join('');
                    document.getElementById('outputMulti').insertBefore(span, null);
                };
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('fileMulti').addEventListener('change', handleFileSelect, false);
    } else {
        console.warn("Ваш браузер не поддерживает FileAPI")
    }
</script>

<script>
    function resetForm() {
        document.getElementById("my-form").reset();
    }

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    $("#my-form").validate({
        rules: {
            current_password: {
                required: true,
                minlength: 8,
                maxlength: 255,
                // remote: {
                //     url: "/password-edit",
                //     method: "post",
                //     // data: new FormData(this),
                //     // processData: false,
                //     // dataType: 'json',
                //     // contentType: false,
                // }
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 255,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            current_password: {
                required: "Это поле необходимо заполнить.",
                minlength: $.validator.format("Пожалуйста, введите не меньше {0} символов."),
                maxlength: $.validator.format("Пожалуйста, введите не больше {0} символов."),
                // remote: 'Пароль не софьпадает',
            },
            password: {
                required: "Это поле необходимо заполнить.",
                minlength: $.validator.format("Пожалуйста, введите не меньше {0} символов."),
                maxlength: $.validator.format("Пожалуйста, введите не больше {0} символов."),
            },
            password_confirmation: {
                required: "Это поле необходимо заполнить.",
                equalTo: "Пожалуйста, введите повторный парол правилно.",
            },
        },
        tooltip_options: {
            current_password: {
                placement: 'left',
            },
            password: {
                placement: 'left',
            },
            password_confirmation: {
                placement: 'left',
            }
        },
        validClass: "is-valid",
        // errorElement: "div",
        errorClass: "is-invalid text-danger",
    });
</script>

{{-- Password view --}}
<script>
    $('body').on('click', '.password-checkbox', function () {
        if ($(this).is(':checked')) {
            $('#current_password').attr('type', 'text');
            $('#password1').attr('type', 'text');
            $('#password_confirmation').attr('type', 'text');
        } else {
            $('#current_password').attr('type', 'password');
            $('#password1').attr('type', 'password');
            $('#password_confirmation').attr('type', 'password');
        }
    });
</script>

</body>

</html>
