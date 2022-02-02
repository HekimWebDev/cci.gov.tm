@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('tm_exhibitionsCreate') }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Создание выстовки</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('tm_exhibitions.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Имя*</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Имя" value="{{ old('title') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Имя (english)</label>
                                    <input type="text" name="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="Имя (english)" value="{{ old('title_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Имя (türkmen)</label>
                                    <input type="text" name="title_tk"
                                        class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                        placeholder="Имя (türkmen)" value="{{ old('title_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label>С (Дата):*</label>
                                    <div class="input-group">
                                        <input type="text" name="datesingle" placeholder="({{ date('d.m.Y') }})"
                                            class="form-control float-right @error('datesingle') is-invalid @enderror"
                                            required id="reservation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>До (Дата):</label>
                                    <div class="input-group">
                                        <input type="text" name="datesingle2" placeholder="({{ date('d.m.Y') }})"
                                            class="form-control float-right @error('datesingle') is-invalid @enderror"
                                            id="reservation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label @error('thumbnail') is-invalid @enderror"
                                            for="thumbnail">Выберите изображение</label>
                                    </div>
                                </div>
                                <img class="img-thumbnail m-1" id="img-preview" width="300" src="" /><br>

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
