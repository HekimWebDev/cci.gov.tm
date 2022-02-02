@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('informationsCreate') }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Создание информация</h4>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('informations.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="phone">Телефон*</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Телефон" required value="{{ old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Электронное почта*</label>
                                    <input type="email" class="form-control @error('adress') is-invalid @enderror"
                                        name="email" id="email" required value="{{ old('email') }}"
                                        placeholder="Электронное почта">
                                </div>

                                <div class="form-group">
                                    <label for="adress">Адрес (russian)*</label>
                                    <input type="text" name="adress"
                                        class="form-control @error('adress') is-invalid @enderror" id="adress"
                                        placeholder="Адрес" required value="{{ old('adress') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_en">Адрес (english)*</label>
                                    <input type="text" name="adress_en"
                                        class="form-control @error('adress_en') is-invalid @enderror" id="adress_en"
                                        placeholder="Адрес" required value="{{ old('adress_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_tk">Адрес (türkmen)*</label>
                                    <input type="text" name="adress_tk"
                                        class="form-control @error('adress_tk') is-invalid @enderror" id="adress_tk"
                                        placeholder="Адрес" required value="{{ old('adress_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label for="web">Веб сайт*</label>
                                    <input type="text" name="web"
                                        class="form-control @error('web') is-invalid @enderror" id="web"
                                        placeholder="Веб сайт" required value="{{ old('web') }}">
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
