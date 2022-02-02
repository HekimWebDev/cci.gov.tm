@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('branchesSingle', $branch) }}
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
                        <h3 class="card-title">{{ $branch->title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Заголовок</dt>
                            <dd class="col-sm-8">{{ $branch->title }}</dd>
                            <dt class="col-sm-4">Описание</dt>
                            <dd class="col-sm-8">{!! $branch->desc !!}</dd>
                            <dt class="col-sm-4">Телефон</dt>
                            <dd class="col-sm-8">{{ $branch->phone }}</dd>
                            <dt class="col-sm-4">Факс</dt>
                            <dd class="col-sm-8">{{ $branch->faks }}</dd>
                            <dt class="col-sm-4">Адрес</dt>
                            <dd class="col-sm-8">{{ $branch->adress }}</dd>
                            <dt class="col-sm-4">Электронное почта</dt>
                            <dd class="col-sm-8">{{ $branch->email }}</dd>
                        </dl>
                        <a class="btn btn-primary" href="{{ route('branches.edit', $branch->id) }}"
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
