<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Авторизоваться для входа панель администратора</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free/css/all.min.css') }}">
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
            <b>Авторизоваться</b><br>
            <small>для входа панель администратора</small>
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

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password-input"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text" style="padding-left: 27px">
                                <a href="#" class="password-control mr-1"></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-6">
                            <button type="submit" class="btn btn-primary btn-block">Авторизоваться</button>
                        </div>
                        <ul>
{{--                            <li><a class="ml-2" href="{{ route('password.request') }}">Забыл пароль</a></li>--}}
                        </ul>
                    </div>
                </form>
            </div>
        </div><!-- /.card -->
    </div>

    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>

    <script>
        $('body').on('click', '.password-control', function() {
            if ($('#password-input').attr('type') == 'password') {
                $(this).addClass('view');
                $('#password-input').attr('type', 'text');
            } else {
                $(this).removeClass('view');
                $('#password-input').attr('type', 'password');
            }
            return false;
        });
    </script>
</body>

</html>
