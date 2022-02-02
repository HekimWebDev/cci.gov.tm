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
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item"><a href="{{ route('news.index') }}">Новости</a></li>
                                <li class="list-group-item"><a href="{{ route('galleries.index') }}">Галерея</a></li>
                                <li class="list-group-item"><a href="{{ route('carousels.index') }}">Каруселные
                                        баннеры</a></li>
                                <li class="list-group-item"><a href="{{ route('banners.index') }}">Баннеры</a></li>
                                <li class="list-group-item"><a href="{{ route('tenders.index') }}">Тендеры</a></li>
                                <li class="list-group-item"><a href="{{ route('partners.index') }}">Партнеры</a></li>
                                <li class="list-group-item"><a href="{{ route('tm_offers.index') }}">Коммерческие
                                        предложения производителей Туркменистана</a></li>
                                <li class="list-group-item"><a href="{{ route('fo_offers.index') }}">Коммерческие
                                        предложения зарубежных партнеров</a></li>
                                <li class="list-group-item"><a href="{{ route('form.index') }}">Анкета соискателя</a>
                                </li>
                                <li class="list-group-item"><a href="{{ route('tm_exhibitions.index') }}">Выставки в
                                        Туркменистане</a></li>
                                <li class="list-group-item"><a href="{{ route('fo_exhibitions.index') }}">Выставки
                                        зарубежом</a></li>
                                <li class="list-group-item"><a href="{{ route('branches.index') }}">Предприятие</a></li>
                                <li class="list-group-item"><a href="{{ route('informations.index') }}">Информация</a>
                                </li>
                                <li class="list-group-item"><a href="{{ route('abouts.index') }}">Страницы "о нас"</a>
                                </li>
                                <li class="list-group-item"><a href="{{ route('memberships.index') }}">Страницы "о
                                        членстве"</a></li>
                                <li class="list-group-item"><a href="{{ route('memberships.index') }}">Страницы
                                        "Инвестиции"</a></li>
                                <li class="list-group-item"><a href="{{ route('conferences.index') }}">Страницы
                                        "Конференции"</a></li>
                            </ul>
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
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
