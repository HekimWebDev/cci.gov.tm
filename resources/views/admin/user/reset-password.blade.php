<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free/css/all.min.css') }}">

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <b>Обновите пароль</b>
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


                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password1"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Пароль" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password', 'updatePassword')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Повторите пароль" required id="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3" style="margin-left: 2px">
                        <label><input type="checkbox" class="password-checkbox"> Показать пароль</label>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-6">
                            <button type="submit" class="btn btn-primary btn-block">Обновить пароль</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.card -->
    </div>

    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
    {{-- Password view --}}
    <script>
        $('body').on('click', '.password-checkbox', function() {
            if ($(this).is(':checked')) {
                $('#password1').attr('type', 'text');
                $('#password_confirmation').attr('type', 'text');
            } else {
                $('#password1').attr('type', 'password');
                $('#password_confirmation').attr('type', 'password');
            }
        });
    </script>
</body>

</html>
