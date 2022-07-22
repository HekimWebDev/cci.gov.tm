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
    <link rel="stylesheet" href="{{asset('assets/admin/css/admin.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome-free/css/all.min.css') }}">

</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>Подтвердите электронную почту</b>
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

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green">
                    {{ session('status') }}
                </div>
            @endif


            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5 offset-7">
                        <button type="submit" class="btn btn-primary btn-block">Подвердить</button>
                    </div>
                    <ul>
                        <li><a class="ml-2" href="{{route('login')}}">Назад</a></li>
                        <li><a class="ml-2" href="{{ route('register') }}">Регистрация</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div><!-- /.card -->
</div>

<script src="{{asset('assets/admin/js/admin.js')}}"></script>
</body>
</html>
