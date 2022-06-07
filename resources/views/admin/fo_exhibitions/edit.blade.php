@extends('admin.layouts.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/lib/daterangepicker-master/daterangepicker.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('fo_exhibitionsEdit', $fo_exhibition) }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $fo_exhibition->title }}</h4>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" enctype="multipart/form-data"
                            action="{{ route('exhibition.fo_exhibitions.update', ['fo_exhibition' => $fo_exhibition->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Имя*</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Имя" value="{{ $fo_exhibition->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Имя (english)</label>
                                    <input type="text" name="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="Имя (english)" value="{{ $fo_exhibition->title_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Имя (türkmen)</label>
                                    <input type="text" name="title_tk"
                                        class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                        placeholder="Имя (türkmen)" value="{{ $fo_exhibition->title_tk }}">
                                </div>

                                <div class="form-group">
                                    <label>Дата*</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" value="{{ $fo_exhibition->date }}" name="date" required
                                            class="form-control float-right" id="reservation">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div>
                                    <img style="width: 400px" src="{{ $fo_exhibition->getImage() }}"
                                        class="img-thumbnail img-fluid mt-2" alt="">
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

                                <div class="form-group">
                                    <label for="file">Файл</label>
                                    <div class="custom-file">
                                        <input type="file" name="file" id="file" class="custom-file-input">
                                        <label class="custom-file-label @error('file') is-invalid @enderror"
                                               for="file">Выберите изображение</label>
                                    </div>

                                    <label class="mt-3" for="file">Файл (tk)</label>
                                    <div class="custom-file">
                                        <input type="file" name="file_tk" id="file_tk" class="custom-file-input">
                                        <label class="custom-file-label @error('file_tk') is-invalid @enderror"
                                               for="file_tk">Выберите файл</label>
                                    </div>

                                    <label class="mt-3" for="file_en">Файл (en)</label>
                                    <div class="custom-file">
                                        <input type="file" name="file_en" id="file_en" class="custom-file-input">
                                        <label class="custom-file-label @error('file_en') is-invalid @enderror"
                                               for="file_en">Выберите файл</label>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

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
        {{-- daterangepicker --}}
        <script src="{{ asset('assets/lib/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('assets/lib/daterangepicker-master/daterangepicker.js') }}"></script>

        <script type="text/javascript">
            $(function () {
                $('input[id="date"]').daterangepicker({
                    autoUpdateInput: false,
                    // locale: {
                    //     cancelLabel: 'Clear'
                    // }
                    "locale": {
                        "format": "MM.DD.YYYY",
                        "separator": " - ",
                        "applyLabel": "Ок",
                        "cancelLabel": "Отмена",
                        "fromLabel": "От",
                        "toLabel": "До",
                        "customRangeLabel": "Произвольный",
                        "daysOfWeek": [
                            "Вс",
                            "Пн",
                            "Вт",
                            "Ср",
                            "Чт",
                            "Пт",
                            "Сб"
                        ],
                        "monthNames": [
                            "Январь",
                            "Февраль",
                            "Март",
                            "Апрель",
                            "Май",
                            "Июнь",
                            "Июль",
                            "Август",
                            "Сентябрь",
                            "Октябрь",
                            "Ноябрь",
                            "Декабрь"
                        ],
                        firstDay: 1
                    }
                });
                $('input[id="date"]').on('apply.daterangepicker', function (ev, picker) {
                    $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format(
                        'DD.MM.YYYY'));
                });
                $('input[id="date"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });
            });
        </script>

        <script>
            $('#datemask').inputmask('dd.mm.yyyy', {
                'placeholder': 'dd.mm.yyyy'
            });
            $('[data-mask]').inputmask()
        </script>
    @endpush
@endsection
