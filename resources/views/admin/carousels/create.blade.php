@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('carouselCreate') }}
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Создать баннер</h4>
                    </div>
                    <!-- /.card-header -->

                    <form role="form" method="post" action="{{ route('carousels.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="thumbnail">Изображение*</label>
                                <div class="custom-file">
                                    <input type="file" name="thumbnail" id="thumbnail" required class="custom-file-input">
                                    <label class="custom-file-label @error('thumbnail') is-invalid @enderror"
                                        for="thumbnail">Выберите изображение</label>
                                </div>
                            </div>
                            <img class="img-thumbnail m-1" id="img-preview" width="300" src="" /><br>

                            <div class="form-group">
                                <label for="thumbnail_en">Изображение (english)*</label>
                                <div class="custom-file">
                                    <input type="file" name="thumbnail_en" required id="thumbnail_en" class="custom-file-input">
                                    <label class="custom-file-label @error('thumbnail_en') is-invalid @enderror"
                                        for="thumbnail_en">Выберите изображение</label>
                                </div>
                            </div>
                            <img class="img-thumbnail m-1" id="img-preview_en" width="300" src="" />

                            <div class="form-group">
                                <label for="thumbnail_tk">Изображение (türkmen)*</label>
                                <div class="custom-file">
                                    <input type="file" name="thumbnail_tk" required id="thumbnail_tk" class="custom-file-input">
                                    <label class="custom-file-label @error('thumbnail_tk') is-invalid @enderror"
                                        for="thumbnail_tk">Выберите изображение</label>
                                </div>
                            </div>
                            <img class="img-thumbnail m-1" id="img-preview_tk" width="300" src="" /><br>

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
