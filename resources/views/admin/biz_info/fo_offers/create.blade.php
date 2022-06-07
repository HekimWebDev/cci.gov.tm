@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('fo_offerCreate') }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Создание предложении</h5>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('admin.biz-info.fo_offers.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="number">Номер предложения*</label>
                                    <input type="number" class="form-control @error('number') is-invalid @enderror"
                                        name="number" id="number" value="{{ old('number') }}" placeholder="Номер предложения">
                                </div>

                                <div class="form-group">
                                    <label for="name">Имя*</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Имя" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_en">Имя (english)</label>
                                    <input type="text" name="name_en"
                                        class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                                        placeholder="Имя (english)" value="{{ old('name_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name_tk">Имя (türkmen)</label>
                                    <input type="text" name="name_tk"
                                        class="form-control @error('name_tk') is-invalid @enderror" id="name_tk"
                                        placeholder="Имя (türkmen)" value="{{ old('name_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label for="desc_tk">Описание (türkmen)</label>
                                    <textarea class="form-control @error('desc_tk') is-invalid @enderror" name="desc_tk"
                                        id="desc_tk" rows="5" placeholder="türkmen">{{ old('desc_tk') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc">Описание (русский)*</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                                        rows="5" id="desc" placeholder="Описание">{{ old('desc') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc_en">Описание (english)</label>
                                    <textarea class="form-control @error('desc_en') is-invalid @enderror" name="desc_en"
                                        id="desc_en" rows="5" placeholder="english">{{ old('desc_en') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Телефон" value="{{ old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label for="faks">Факс</label>
                                    <input type="text" name="faks" class="form-control @error('faks') is-invalid @enderror"
                                        id="faks" placeholder="Факс" value="{{ old('faks') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Электронное почта</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Электронное почта">
                                </div>

                                <div class="form-group">
                                    <label for="web">Веб-сайт</label>
                                    <input type="text" name="web" class="form-control @error('web') is-invalid @enderror"
                                        id="web" placeholder="Веб-сайт" value="{{ old('web') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress">Адрес</label>
                                    <input type="text" name="adress"
                                        class="form-control @error('adress') is-invalid @enderror" id="adress"
                                        placeholder="Адрес" value="{{ old('adress') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_en">Адрес (english)</label>
                                    <input type="text" name="adress_en"
                                        class="form-control @error('adress_en') is-invalid @enderror" id="adress_en"
                                        placeholder="Адрес" value="{{ old('adress_en') }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_tk">Адрес (türkmen)</label>
                                    <input type="text" name="adress_tk"
                                        class="form-control @error('adress_tk') is-invalid @enderror" id="adress_tk"
                                        placeholder="Адрес" value="{{ old('adress_tk') }}">
                                </div>

                                <div class="form-group">
                                    <label for="datesingle">Дата</label>
                                    <input type="text" name="datesingle"
                                        class="form-control @error('datesingle') is-invalid @enderror" id="datesingle"
                                        placeholder="Адрес" value="{{ old('datesingle') }}">
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

    @push('scripts')
        {{-- ckeditor --}}
        <script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>

        <script src="{{ asset('assets/admin/js/ckfinder-desc.js') }}"></script>
    @endpush
@endsection
