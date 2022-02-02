<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Страница регистрации администратора</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free/css/all.css') }}">
    <style>
        .password {
            position: relative;
        }

        .password-control {
            position: absolute;
            top: 11px;
            right: 6px;
            display: inline-block;
            width: 20px;
            height: 20px;
            background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
        }

        .password-control.view {
            background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
        }

    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <b>Регистрация</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('register') }}" method="post" id="my-form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Имя" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text bg-light" style="padding-left: 14px;">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Электронное почта" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text bg-light" >
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Пароль" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-light" style="padding-left: 14px;">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Повторите пароль" required id="password-confirm">
                        <div class="input-group-append">
                            <div class="input-group-text bg-light" style="padding-left: 14px;">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3" style="margin-left: 2px">
                        <label><input type="checkbox" class="password-checkbox"> Показать пароль</label>
                    </div>

                    <div class="row">
                        <div class="col-5 offset-7">
                            <button type="submit" class="btn btn-primary btn-block">Регистрация</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">У меня уже есть логин</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-validation/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-validation/jquery-validation-bootstrap-tooltip.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

        $("#my-form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 30,
                },
                email: {
                    required: true,
                    minlength: 3,
                    maxlength: 255,
                    email: true,
                    remote: {
                        url: "/check-email",
                        type: "post",
                    }
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
                name: {
                    required: "Это поле необходимо заполнить.",
                    maxlength: $.validator.format("Пожалуйста, введите не больше {0} символов."),
                    minlength: $.validator.format("Пожалуйста, введите не меньше {0} символов."),
                },
                email: {
                    required: "Это поле необходимо заполнить.",
                    email: "Пожалуйста, введите корректный адрес электронной почты.",
                    maxlength: $.validator.format("Пожалуйста, введите не больше {0} символов."),
                    remote: 'Эл. адрес уже существует',
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
                name: {
                    trigger: 'focus',
                    placement: 'left',
                },
                email: {
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
    <script>
        $('body').on('click', '.password-checkbox', function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
                $('#password-confirm').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
                $('#password-confirm').attr('type', 'password');
            }
        });

    </script>
</body>

</html>
