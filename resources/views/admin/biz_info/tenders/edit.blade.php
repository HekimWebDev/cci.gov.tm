@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('tenderEdit', $tender) }}</h6>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $tender->title }}"</h5>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('admin.biz-info.tenders.update', ['tender' => $tender->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Заголовок (русский)*</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" required id="title"
                                        placeholder="Название" value="{{ $tender->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Заголовок (türkmen)</label>
                                    <input type="text" name="title_tk"
                                        class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                        placeholder="Заголовок" value="{{ $tender->title_tk }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Заголовок (english)</label>
                                    <input type="text" name="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="Заголовок" value="{{ $tender->title_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="desc">Описания (русский)*</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                                        required rows="5" placeholder="Описания">{{ $tender->desc }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc_tk">Описание (türkmen)</label>
                                    <textarea class="form-control @error('desc_tk') is-invalid @enderror" name="desc_tk"
                                        id="desc_tk" rows="5" placeholder="türkmen">{{ $tender->desc_tk }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc_en">Описание (english)</label>
                                    <textarea class="form-control @error('desc_en') is-invalid @enderror" name="desc_en"
                                        id="desc_en" rows="5" placeholder="english">{{ $tender->desc_en }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Телефон" value="{{ $tender->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="faks">Факс</label>
                                    <input type="text" name="faks" class="form-control @error('faks') is-invalid @enderror"
                                        id="faks" placeholder="Факс" value="{{ $tender->faks }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress">Адрес (русский)</label>
                                    <input type="text" name="adress"
                                        class="form-control @error('adress') is-invalid @enderror" id="adress"
                                        placeholder="Адрес" value="{{ $tender->adress }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_tk">Адрес (türkmen)</label>
                                    <input type="text" name="adress_tk"
                                        class="form-control @error('adress_tk') is-invalid @enderror" id="adress_tk"
                                        placeholder="Адрес" value="{{ $tender->adress_tk }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_en">Адрес (english)</label>
                                    <input type="text" name="adress_en"
                                        class="form-control @error('adress_en') is-invalid @enderror" id="adress_en"
                                        placeholder="Адрес" value="{{ $tender->adress_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Электронное почта</label>
                                    <input type="email" class="form-control @error('adress') is-invalid @enderror"
                                        name="email" id="email" value="{{ $tender->email }}"
                                        placeholder="Электронное почта">
                                </div>

                                <div class="form-group">
                                    <label for="web">Веб-сайт</label>
                                    <input type="text" name="web" class="form-control @error('web') is-invalid @enderror"
                                        id="web" placeholder="Веб-сайт" value="{{ $tender->web }}">
                                </div>

                                <div class="form-group">
                                    <label for="organizer">Организатор (русский)</label>
                                    <input type="text" name="organizer"
                                        class="form-control @error('organizer') is-invalid @enderror" id="organizer"
                                        placeholder="Организатор" value="{{ $tender->organizer }}">
                                </div>

                                <div class="form-group">
                                    <label for="organizer_tk">Организатор (türkmen)</label>
                                    <input type="text" name="organizer_tk"
                                        class="form-control @error('organizer_tk') is-invalid @enderror" id="organizer_tk"
                                        placeholder="Организатор" value="{{ $tender->organizer_tk }}">
                                </div>

                                <div class="form-group">
                                    <label for="organizer_en">Организатор (english)</label>
                                    <input type="text" name="organizer_en"
                                        class="form-control @error('organizer_en') is-invalid @enderror" id="organizer_en"
                                        placeholder="Организатор" value="{{ $tender->organizer_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="datesingle">Дата</label>
                                    <input type="date" name="datesingle"
                                        class="form-control @error('datesingle') is-invalid @enderror" id="datesingle"
                                        placeholder="Дата" value="{{ $tender->datesingle }}">
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

    @push('scripts')
        {{-- ckeditor --}}
        <script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>

        <script src="{{ asset('assets/admin/js/ckfinder-desc.js') }}"></script>
    @endpush
@endsection
