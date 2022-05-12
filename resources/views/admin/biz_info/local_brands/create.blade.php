@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('brandCreate') }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Создание бренда</h5>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('admin.biz-info.local-brands.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Заголовок*</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                           id="title" placeholder="Заголовок" value="{{ old('title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Заголовок (english)</label>
                                    <input type="text" name="title_en"
                                           class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                           placeholder="Заголовок (english)" value="{{ old('title_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Заголовок (türkmen)</label>
                                    <input type="text" name="title_tk"
                                           class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                           placeholder="Заголовок (türkmen)" value="{{ old('title_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label for="article">Описание (русский)*</label>
                                    <textarea class="form-control @error('article') is-invalid @enderror" name="article" id="article"
                                              rows="5" id="article" placeholder="Описание">{{ old('article') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="article_tk">Описание (türkmen)</label>
                                    <textarea class="form-control @error('article_tk') is-invalid @enderror" name="article_tk"
                                              id="article_tk" rows="5" placeholder="türkmen">{{ old('article_tk') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="article_en">Описание (english)</label>
                                    <textarea class="form-control @error('article_en') is-invalid @enderror" name="article_en"
                                              id="article_en" rows="5" placeholder="english">{{ old('article_en') }}</textarea>
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
