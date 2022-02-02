@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('contactsCreate') }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Создание контактов</h4>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('contacts.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя (русский)*</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Имя" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_en">Имя (english)*</label>
                                    <input type="text" name="name_en"
                                        class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                                        placeholder="Имя (english)" value="{{ old('name_en') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_tk">Имя (türkmen)*</label>
                                    <input type="text" name="name_tk"
                                        class="form-control @error('name_tk') is-invalid @enderror" id="name_tk"
                                        placeholder="Имя (türkmen)" value="{{ old('name_tk') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Телефон*</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Телефон" value="{{ old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label for="faks">Факс* </label>
                                    <input type="text" name="faks" class="form-control @error('faks') is-invalid @enderror"
                                        id="faks" placeholder="Факс" value="{{ old('faks') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Электронное почта*</label>
                                    <input type="email" class="form-control @error('adress') is-invalid @enderror"
                                        name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Электронное почта">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-danger mr-1">Отменить</a>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
