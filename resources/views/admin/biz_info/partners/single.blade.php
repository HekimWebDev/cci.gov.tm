@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <h6>{{ Breadcrumbs::render('partnerSingle', $partner) }}</h6>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h3 >{{ $partner->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Показать в главном странице</dt>
                            <dd class="col-sm-8">{{ $partner->is_show }}</dd>
                            <dt class="col-sm-4">Имя</dt>
                            <dd class="col-sm-8">{{ $partner->name }}</dd>
                            <dt class="col-sm-4">Имя(english)</dt>
                            <dd class="col-sm-8">{{ $partner->name_en }}</dd>
                            <dt class="col-sm-4">Имя(türkmen)</dt>
                            <dd class="col-sm-8">{{ $partner->name_tk }}</dd>
                            <dt class="col-sm-4">Заголовок</dt>
                            <dd class="col-sm-8">{{ $partner->title }}</dd>
                            <dt class="col-sm-4">Заголовок(english)</dt>
                            <dd class="col-sm-8">{{ $partner->title_en }}</dd>
                            <dt class="col-sm-4">Заголовок(türkmen)</dt>
                            <dd class="col-sm-8">{{ $partner->title_tk }}</dd>
                            <dt class="col-sm-4">Телефон</dt>
                            <dd class="col-sm-8">{{ $partner->phone }}</dd>
                            <dt class="col-sm-4">Факс</dt>
                            <dd class="col-sm-8">{{ $partner->faks }}</dd>
                            <dt class="col-sm-4">Адрес</dt>
                            <dd class="col-sm-8">{{ $partner->adress }}</dd>
                            <dt class="col-sm-4">Адрес(english)</dt>
                            <dd class="col-sm-8">{{ $partner->adress_en }}</dd>
                            <dt class="col-sm-4">Адрес(türkmen)</dt>
                            <dd class="col-sm-8">{{ $partner->adress_tk }}</dd>
                            <dt class="col-sm-4">Электронное почта</dt>
                            <dd class="col-sm-8">{{ $partner->email }}</dd>
                            <dt class="col-sm-4">Веб-сайт</dt>
                            <dd class="col-sm-8">{{ $partner->web }}</dd>
                        </dl>
                        <div class="card-title mr-3">
                            <img src="{{ $partner->getImage() }}" class="img-thumbnail img-fluid">
                        </div>
                        <a class="btn btn-primary" href="{{ route('admin.biz-info.partners.edit', $partner->id) }}"
                            role="button">Редактировать</a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
@endsection
