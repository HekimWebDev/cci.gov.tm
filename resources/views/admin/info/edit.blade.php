@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('informationsEdit', $information) }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form role="form" method="post" enctype="multipart/form-data"
                            action="{{ route('informations.update', $information->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="phone">Телефон*</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Телефон" value="{{ $information->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Электронное почта*</label>
                                    <input type="email" class="form-control @error('adress') is-invalid @enderror"
                                        name="email" id="email" value="{{ $information->email }}"
                                        placeholder="Электронное почта">
                                </div>

                                <div class="form-group">
                                    <label for="adress">Адрес (русский)*</label>
                                    <input type="text" name="adress"
                                        class="form-control @error('adress') is-invalid @enderror" id="adress"
                                        placeholder="Адрес" value="{{ $information->adress }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_en">Адрес (english)*</label>
                                    <input type="text" name="adress_en"
                                        class="form-control @error('adress_en') is-invalid @enderror" id="adress_en"
                                        placeholder="Адрес" value="{{ $information->adress_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_tk">Адрес (türkmen)*</label>
                                    <input type="text" name="adress_tk"
                                        class="form-control @error('adress_tk') is-invalid @enderror" id="adress_tk"
                                        placeholder="Адрес" value="{{ $information->adress_tk }}">
                                </div>

                                <div class="form-group">
                                    <label for="web">Веб сайт*</label>
                                    <input type="text" name="web"
                                        class="form-control @error('web') is-invalid @enderror" id="web"
                                        placeholder="Веб сайт" required value="{{ $information->web }}">
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
