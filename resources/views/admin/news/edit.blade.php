@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid ml-3">
            <h6>{{ Breadcrumbs::render('newsEdit', $news) }}</h6>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-created_at">{{ $news->title }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" enctype="multipart/form-data"
                              action="{{ route('news.update', ['news' => $news->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                {{-- Title --}}
                                <div class="form-group mb-5">
                                    <div>
                                        <label for="name">
                                            Name
                                            <span class="required text-danger">*</span>
                                        </label>
                                    </div>

                                    <div class="card-header p-2 mb-1">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#ru" data-toggle="tab">Русский</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#tk" data-toggle="tab">Türkmen</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="#en" data-toggle="tab">English</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        {{-- Ru --}}
                                        <div class="active tab-pane" id="ru">
                                            <input type="text" id="title" name="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title') ?? $news->title }}">

                                            @error('title')
                                            <span style="display: none" class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        {{-- Tk --}}
                                        <div class="tab-pane" id="tk">
                                            <input type="text" id="title_tk" name="title_tk"
                                                   class="form-control @error('title_tk') is-invalid @enderror"
                                                   value="{{ old('title_tk') ?? $news->title_tk }}">

                                            @error('title_tk')
                                            <span style="display: none" class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        {{-- En --}}
                                        <div class="tab-pane" id="en">
                                            <input type="text" id="title_en" name="title_en"
                                                   class="form-control @error('title_en') is-invalid @enderror"
                                                   value="{{ old('title_en') ?? $news->title_en }}">

                                            @error('title_en')
                                            <span style="display: none" class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                {{-- Desc --}}
                                <div class="form-group">
                                    <div>
                                        <label for="description">
                                            Description
                                            <span class="required text-danger">*</span>
                                        </label>
                                    </div>

                                    <div class="card-header p-2 mb-1">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#ruu" data-toggle="tab">Русский</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#tkk" data-toggle="tab">Türkmen</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#enn" data-toggle="tab">English</a>
                                            </li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="lang-group">
                                        <div class="tab-content">
                                            {{-- Ru --}}
                                            <div class="active tab-pane" id="ruu">
                                                <textarea id="desc" name="desc"
                                                          class="ckeditor form-control @error('desc') is-invalid @enderror">
                                                    {{ old('desc') ?? $news->desc }}
                                                </textarea>

                                                @error('desc')
                                                <span style="display: none" class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{-- Tk --}}
                                            <div class="tab-pane" id="tkk">
                                                <textarea id="desc_tk" name="desc_tk"
                                                          class="ckeditor form-control @error('desc_tk') is-invalid @enderror">
                                                    {{ old('desc_tk') ?? $news->desc_tk }}
                                                </textarea>

                                                @error('desc_tk')
                                                <span style="display: none" class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{-- En --}}
                                            <div class="tab-pane" id="enn">
                                                <textarea id="desc_en" name="desc_en"
                                                          class="ckeditor form-control @error('desc_en') is-invalid @enderror">
                                                    {{ old('desc_en') ?? $news->desc_en }}
                                                </textarea>

                                                @error('desc_en')
                                                <span style="display: none" class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- date --}}
                                <div class="form-group">
                                    <label for="date">Дата добавление</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        <input type="text" name="date" value="{{ $news->date }}" data-mask
                                               class="form-control @error('date') is-invalid @enderror"
                                               data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy.mm.dd">
                                    </div>
                                </div>

                                {{-- image --}}
                                <div>
                                    <img style="width: 400px" src="{{ $news->getImage() }}" class="img-thumbnail"
                                         alt="">
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label @error('thumbnail') is-invalid @enderror"
                                               for="thumbnail">Выберите изображение</label>
                                    </div>
                                    <div>
                                        <img id="img-preview" class="img-responsive img-thumbnail" width="300" src=""/>
                                    </div>
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

        <script>
            $('#datemask').inputmask('dd.mm.yyyy', {
                'placeholder': 'dd.mm.yyyy'
            });
            $('[data-mask]').inputmask()
        </script>
    @endpush
@endsection
