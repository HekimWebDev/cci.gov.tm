@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5 text-center">
                    <h1>Профиль администратора</h1>
                </div>
                <div class="col-7 d-flex justify-content-end pr-4">
                    <h6>{{ Breadcrumbs::render('home') }}</h6>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col-12">
                                    <p class="float-left">Имя:</p>
                                    <p class="float-right">{{ $user->name }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="float-left">Логин:</p>
                                    <p class="float-right">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">Настройки профиля</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#settings" data-toggle="tab">Изменить пароль</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#admins" data-toggle="tab">Все админы <span
                                            class="badge badge-pill badge-success">{{ $users->where('is_admin', 1)->count() }}</span></a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="tab-pane active" id="profile">
                                    <div class="card-header col-md-8">Настройки профиля</div>
                                    <div class="card-body register-card-body col-md-8">

                                        <form class="form-horizontal" method="post"
                                            action="{{ route('user-profile-information.update') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" placeholder="Name"
                                                    value="{{ old('name') ?? auth()->user()->name }}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email"
                                                    value="{{ old('email') ?? auth()->user()->email }}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Изменить</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="settings">
                                    <div class="card-header col-md-8">Изменить пароль</div>
                                    <div class="card-body register-card-body col-md-8">
                                        <form class="form-horizontal" method="post" id="my-form"
                                            action="{{ route('user-password.update') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group mb-3">
                                                <input name="current_password" type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    id="current_password" placeholder="Текущий пароль">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                                @error('current_password', 'updatePassword')
                                                    <span class="alert alert-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <input name="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password1" placeholder="Новый пароль">
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
                                                <input name="password_confirmation" type="password" class="form-control"
                                                    id="password_confirmation" placeholder="Подтвердите пароль">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3" style="margin-left: 2px">
                                                <label><input type="checkbox" class="password-checkbox"> Показать
                                                    пароль</label>
                                            </div>

                                            <button type="button" class="btn btn-danger"
                                                onclick="resetForm();">Отменить</button>
                                            <button type="submit" class="btn btn-primary">Изменить пароль</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="admins">
                                    <table class="table table-hover table-inverse table-responsive">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Id</th>
                                                <th>Имя</th>
                                                <th>Статус</th>
                                                <th>Действие</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td @if ($user->id == Auth::user()->id) class="text-success" @endif>
                                                        {{ $user->name }}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch m-0 p-0">
                                                            @if ($user->is_admin)
                                                                <span class="badge badge-success">Admin</span>
                                                            @else
                                                                <span class="badge badge-danger">No Admin</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    @if ($user->id != Auth::user()->id)
                                                        <td>
                                                            <a href="{{ route('user.edit', ['id' => $user->id]) }}"
                                                                class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>

                                                            <form action="{{ route('user.delete', $user->id) }}"
                                                                method="post" class="float-left">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Подтвердите удаление')">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('assets/lib/jquery-validation/jquery.validate.js') }}"></script>
        <script src="{{ asset('assets/lib/jquery-validation/jquery.form.js') }}"></script>
        <script src="{{ asset('assets/lib/jquery-validation/jquery-validation-bootstrap-tooltip.js') }}"></script>
        {{-- validation --}}
        <script>
            function resetForm() {
                document.getElementById("my-form").reset();
            }

            $("#my-form").validate({
                rules: {
                    current_password: {
                        required: true,
                        minlength: 8,
                        maxlength: 255,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 255,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password1",
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

    @endpush
@endsection
