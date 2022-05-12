@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('tenderSingle', $tender) }}</h6>
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
                            <h3 class="card-title">{{ $tender->title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Заголовок</dt>
                                <dd class="col-sm-8">{{ $tender->title }}</dd>
                                <dt class="col-sm-4">Заголовок (english)</dt>
                                <dd class="col-sm-8">{{ $tender->title_en }}</dd>
                                <dt class="col-sm-4">Заголовок (türkmen)</dt>
                                <dd class="col-sm-8">{{ $tender->title_tk }}</dd>
                                <dt class="col-sm-4">Описание</dt>
                                <dd class="col-sm-8">{!! $tender->desc !!}</dd>
                                <dt class="col-sm-4">Описание (english)</dt>
                                <dd class="col-sm-8">{!! $tender->desc_en !!}</dd>
                                <dt class="col-sm-4">Описание (türkmen)</dt>
                                <dd class="col-sm-8">{!! $tender->desc_tk !!}</dd>
                                <dt class="col-sm-4">Телефон</dt>
                                <dd class="col-sm-8">{{ $tender->phone }}</dd>
                                <dt class="col-sm-4">Факс</dt>
                                <dd class="col-sm-8">{{ $tender->faks }}</dd>
                                <dt class="col-sm-4">Адрес</dt>
                                <dd class="col-sm-8">{{ $tender->adress }}</dd>
                                <dt class="col-sm-4">Адрес (english)</dt>
                                <dd class="col-sm-8">{{ $tender->adress_en }}</dd>
                                <dt class="col-sm-4">Адрес (türkmen)</dt>
                                <dd class="col-sm-8">{{ $tender->adress_tk }}</dd>
                                <dt class="col-sm-4">Электронное почта</dt>
                                <dd class="col-sm-8">{{ $tender->email }}</dd>
                                <dt class="col-sm-4">Веб-сайт</dt>
                                <dd class="col-sm-8">{{ $tender->web }}</dd>
                                <dt class="col-sm-4">Организатор</dt>
                                <dd class="col-sm-8">{{ $tender->organizer }}</dd>
                                <dt class="col-sm-4">Организатор (english)</dt>
                                <dd class="col-sm-8">{{ $tender->organizer_en }}</dd>
                                <dt class="col-sm-4">Организатор (türkmen)</dt>
                                <dd class="col-sm-8">{{ $tender->organizer_tk }}</dd>
                                <dt class="col-sm-4">Дата</dt>
                                <dd class="col-sm-8">{{ $tender->datesingle }}</dd>
                            </dl>
                            <a class="btn btn-primary" href="{{ route('admin.biz-info.tenders.edit', $tender->id) }}"
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
