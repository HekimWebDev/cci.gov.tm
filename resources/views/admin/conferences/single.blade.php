@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Предприятие</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $conference->title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Имя</dt>
                            <dd class="col-sm-8">{{ $conference->name }}</dd>
                            <dt class="col-sm-4">Заголовок</dt>
                            <dd class="col-sm-8">{{ $conference->title }}</dd>
                            <dt class="col-sm-4">Описание</dt>
                            <dd class="col-sm-8">{!! $conference->desc !!}</dd>
                            <dt class="col-sm-4">Содержание</dt>
                            <dd class="col-sm-8">{!! $conference->content !!}</dd>
                            <dt class="col-sm-4">Дата</dt>
                            <dd class="col-sm-8">{{ $conference->date }}</dd>
                        </dl>
                        <a class="btn btn-primary" href="{{ route('conferences.edit', $conference->id) }}"
                            role="button">Редактировать</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
