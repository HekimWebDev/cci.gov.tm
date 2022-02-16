@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редоктирование конференции</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $conferences->title }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('conferences.update', $conferences->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя*</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Имя" value="{{ $conferences->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_en">Имя (english)*</label>
                                    <input type="text" name="name_en"
                                        class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                                        placeholder="Имя (english)" value="{{ $conferences->name_en }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name_tk">Имя (türkmen)*</label>
                                    <input type="text" name="name_tk"
                                        class="form-control @error('name_tk') is-invalid @enderror" id="name_tk"
                                        placeholder="Имя (türkmen)" value="{{ $conferences->name_tk }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Заголовок*</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Название" value="{{ $conferences->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title_en">Заголовок (english)</label>
                                    <input type="text" name="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="Заголовок (english)" value="{{ $conferences->title_en }}">
                                </div>

                                <div class="form-group">
                                    <label for="title_tk">Заголовок (türkmen)</label>
                                    <input type="text" name="title_tk"
                                        class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                        placeholder="Заголовок (türkmen)" value="{{ $conferences->title_tk }}">
                                </div>

                                <div class="form-group">
                                    <label for="desc">Описание*</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                                        rows="5" placeholder="Описание" required>{{ $conferences->desc }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc_en">Описание (english)</label>
                                    <textarea class="form-control @error('desc_en') is-invalid @enderror" name="desc_en"
                                        id="desc_en" rows="5" placeholder="english">{{ $conferences->desc_en }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="desc_tk">Описание (türkmen)</label>
                                    <textarea class="form-control @error('desc_tk') is-invalid @enderror" name="desc_tk"
                                        id="desc_tk" rows="5" placeholder="türkmen">{{ $conferences->desc_tk }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Содержание <small style="color: red">* теперь не обязательно</small></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                                        rows="5" placeholder="Содержание" required>{{ $conferences->content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content_en">Содержание (english) <small style="color: red">* теперь не обязательно</small></label>
                                    <textarea class="form-control @error('content_en') is-invalid @enderror" name="content_en"
                                        id="content_en" rows="5" placeholder="english">{{ $conferences->content_en }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content_tk">Содержание (türkmen) <small style="color: red">* теперь не обязательно</small></label>
                                    <textarea class="form-control @error('content_tk') is-invalid @enderror" name="content_tk"
                                        id="content_tk" rows="5" placeholder="türkmen">{{ $conferences->content_tk }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="date">Дата</label>
                                    <input type="text" name="date"
                                        class="form-control @error('date') is-invalid @enderror" id="date"
                                        placeholder="Адрес" value="{{ $conferences->date }}">
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
