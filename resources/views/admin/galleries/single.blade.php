@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('gallerySingle', $gallery) }}</h6>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header align-items-center justify-content-center">
                            <h1 class="card-title">{{ $gallery->__('title') }}</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body row">
                            @foreach ($album as $a)
                                <div class="col-sm-3 col-lg-4">
                                    <a target="_blank" href="{{ asset('uploads/'.$a) }}">
                                        <img src="{{ asset('uploads/'.$a) }}" class="img-fluid mb-2" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="btn btn-primary" href="{{ route('galleries.edit', $gallery->id) }}"
                           role="button">Редактировать</a>
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
