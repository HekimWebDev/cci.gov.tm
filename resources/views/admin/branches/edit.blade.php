@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('branchesEdit', $branches) }}
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $branches->title }}"</h4>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('branches.update', $branches->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя*</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Имя" value="{{ $branches->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_en">Имя (english)*</label>
                                    <input type="text" name="name_en"
                                        class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                                        placeholder="Имя (english)" value="{{ $branches->name_en }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_tk">Имя (türkmen)*</label>
                                    <input type="text" name="name_tk"
                                        class="form-control @error('name_tk') is-invalid @enderror" id="name_tk"
                                        placeholder="Имя (türkmen)" value="{{ $branches->name_tk }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Заголовок*</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Название" value="{{ $branches->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Заголовок (english)</label>
                                    <input type="text" name="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="Заголовок (english)" value="{{ $branches->title_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Заголовок (türkmen)</label>
                                    <input type="text" name="title_tk"
                                        class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                        placeholder="Заголовок (türkmen)" value="{{ $branches->title_tk }}">
                                </div>

                                <div class="form-group">
                                    <label for="desc">Описания*</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                                        rows="5" placeholder="Описания" required>{{ $branches->desc }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc_en">Описание (english)</label>
                                    <textarea class="form-control @error('desc_en') is-invalid @enderror" name="desc_en"
                                        id="desc_en" rows="5" placeholder="english">{{ $branches->desc_en }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc_tk">Описание (türkmen)</label>
                                    <textarea class="form-control @error('desc_tk') is-invalid @enderror" name="desc_tk"
                                        id="desc_tk" rows="5" placeholder="türkmen">{{ $branches->desc_tk }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Телефон" value="{{ $branches->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="faks">Факс</label>
                                    <input type="text" name="faks" class="form-control @error('faks') is-invalid @enderror"
                                        id="faks" placeholder="Факс" value="{{ $branches->faks }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress">Адрес</label>
                                    <input type="text" name="adress"
                                        class="form-control @error('adress') is-invalid @enderror" id="adress"
                                        placeholder="Адрес" value="{{ $branches->adress }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_en">Адрес (english)</label>
                                    <input type="text" name="adress_en"
                                        class="form-control @error('adress_en') is-invalid @enderror" id="adress_en"
                                        placeholder="Адрес" value="{{ $branches->adress_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="adress_tk">Адрес (türkmen)</label>
                                    <input type="text" name="adress_tk"
                                        class="form-control @error('adress_tk') is-invalid @enderror" id="adress_tk"
                                        placeholder="Адрес" value="{{ $branches->adress_tk }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Электронное почта</label>
                                    <input type="email" class="form-control @error('adress') is-invalid @enderror"
                                        name="email" id="email" value="{{ $branches->email }}"
                                        placeholder="Электронное почта">
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
    <!-- /.content -->

    @push('scripts')
        {{-- ckeditor --}}
        <script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>

        <script src="{{ asset('assets/admin/js/ckfinder-desc.js') }}"></script>
    @endpush
@endsection
