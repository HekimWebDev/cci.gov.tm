@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('partnerCreate') }}</h6>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Создание партнеров</h5>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('admin.biz-info.partners.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- Is show --}}
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="is_show"
                                               class="custom-control-input @error('is_show') is-invalid @enderror"
                                               name="is_show" value="1" {{ old('is_show') === '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_show">Показать в главном странице</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Имя (русский)*</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name" placeholder="Имя" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_tk">Имя (türkmen)</label>
                                    <input type="text" name="name_tk"
                                           class="form-control @error('name_tk') is-invalid @enderror" id="name_tk"
                                           placeholder="Имя (türkmen)" value="{{ old('name_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name_en">Имя (english)</label>
                                    <input type="text" name="name_en"
                                           class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                                           placeholder="Имя (english)" value="{{ old('name_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="title">Заголовок (русский)*</label>
                                    <textarea class="form-control @error('title') is-invalid @enderror"
                                              name="title" id="title" rows="5"
                                              placeholder="Заголовок (türkmen)">{{ old('title') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Заголовок (türkmen)</label>
                                    <textarea class="form-control @error('title_tk') is-invalid @enderror"
                                              name="title_tk"
                                              id="title_tk" rows="5"
                                              placeholder="Заголовок (türkmen)">{{ old('title_tk') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Заголовок (english)</label>
                                    <textarea class="form-control @error('title_en') is-invalid @enderror"
                                              name="title_en"
                                              id="title_en" rows="5"
                                              placeholder="Заголовок (english)">{{ old('title_en') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" name="phone"
                                           class="form-control @error('phone') is-invalid @enderror" id="phone"
                                           placeholder="Телефон" value="{{ old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label for="faks">Факс</label>
                                    <input type="text" name="faks"
                                           class="form-control @error('faks') is-invalid @enderror"
                                           id="faks" placeholder="Факс" value="{{ old('faks') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Электронное почта</label>
                                    <input type="email" class="form-control @error('adress') is-invalid @enderror"
                                           name="email" id="email" value="{{ old('email') }}"
                                           placeholder="Электронное почта">
                                </div>

                                <div class="form-group">
                                    <label for="web">Веб-сайт</label>
                                    <input type="text" name="web"
                                           class="form-control @error('web') is-invalid @enderror"
                                           id="web" placeholder="Веб-сайт" value="{{ old('web') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress">Адрес (русский)</label>
                                    <input type="text" name="adress"
                                           class="form-control @error('adress') is-invalid @enderror" id="adress"
                                           placeholder="Адрес" value="{{ old('adress') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_tk">Адрес (türkmen)</label>
                                    <input type="text" name="adress_tk"
                                           class="form-control @error('adress_tk') is-invalid @enderror" id="adress_tk"
                                           placeholder="Адрес" value="{{ old('adress_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_en">Адрес (english)</label>
                                    <input type="text" name="adress_en"
                                           class="form-control @error('adress_en') is-invalid @enderror" id="adress_en"
                                           placeholder="Адрес" value="{{ old('adress_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label @error('thumbnail') is-invalid @enderror"
                                               for="thumbnail">Выберите изображение</label>
                                    </div>
                                </div>
                                <img class="img-thumbnail m-1" id="img-preview" width="300" src=""/><br>

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
