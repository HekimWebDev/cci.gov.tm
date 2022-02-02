@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid ml-3">
            <h6>{{ Breadcrumbs::render('galleryCreate') }}</h6>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Создать галерею</h4>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('galleries.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Заголовок (русский)*</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Имя" value="{{ old('title') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Заголовок (türkmen)*</label>
                                    <input type="text" name="title_tk" required
                                        class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                        placeholder="türkmen" value="{{ old('title_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Заголовок (english)*</label>
                                    <input type="text" name="title_en" required
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="english" value="{{ old('title_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Изображение (обложка)*</label>
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" required class="custom-file-input">
                                        <label class="custom-file-label @error('thumbnail') is-invalid @enderror"
                                            for="thumbnail">Выберите изображение</label>
                                    </div>
                                </div>
                                <img class="img-thumbnail m-1" id="img-preview" width="300" src="" /><br>

                                <div class="form-group">
                                    <label for="album">Изображении (альбом)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="album[]" accept="image/*" id="fileMulti"
                                                multiple="multiple" class="custom-file-input">
                                            </div>
                                            <label class="custom-file-label" for="album">Выберите фотографии</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <span id="outputMulti"></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-danger mr-1">Отменить</a>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
