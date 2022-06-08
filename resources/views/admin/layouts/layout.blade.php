<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free-6.1.1/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">--}}

    <link rel="stylesheet" href="{{ asset('assets/front/css/ckeditor-style.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/breadcrumbs.css') }}">
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>

    @stack('styles')

</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.components.navbar')

    <!-- Main Sidebar Container -->
    @include('admin.components.sidebar')

    <!-- Notification Container -->
    @include('admin.components.notification')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script src="{{ asset('assets/lib/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.inputmask.bundle.min.js') }}"></script>


<script src="{{ asset('assets/admin/js/view-images.js') }}"></script>

@stack('scripts')

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

</body>
</html>
