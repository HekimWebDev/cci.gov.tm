@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('tm_exhibitionsEdit', $tm_exhibition) }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $tm_exhibition->title }}</h5>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" enctype="multipart/form-data"
                            action="{{ route('exhibition.tm_exhibitions.update', ['tm_exhibition' => $tm_exhibition->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Имя*</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Имя" value="{{ $tm_exhibition->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Имя (english)</label>
                                    <input type="text" name="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="Имя (english)" value="{{ $tm_exhibition->title_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Имя (türkmen)</label>
                                    <input type="text" name="title_tk"
                                        class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                        placeholder="Имя (türkmen)" value="{{ $tm_exhibition->title_tk }}">
                                </div>

                                <div class="form-group">
                                    <label>Дата*</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ $tm_exhibition->datesingle }}" name="datesingle"
                                            class="form-control float-right" id="reservation" required>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div>
                                    <img style="width: 400px" src="{{ $tm_exhibition->getImage() }}"
                                        class="img-thumbnail img-fluid mt-2" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label @error('thumbnail') is-invalid @enderror"
                                            for="thumbnail">Выберите изображение</label>
                                    </div>
                                    <img class="img-thumbnail m-1" id="img-preview" width="300" src="" /><br>

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
