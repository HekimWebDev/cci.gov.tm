@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('brand') }}</h6>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Список брендов</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('admin.biz-info.local-brands.create') }}" class="btn btn-primary mb-3">Добавить</a>
                            @if (count($brands))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Action </th>
                                            <th>Заголовок</th>
                                            <th>Описания</th>
                                            <th>Дата</th>
                                            <th>Изображение</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.biz-info.local-brands.edit', $brand->id) }}"
                                                       class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin.biz-info.local-brands.destroy', $brand->id) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ $brand->title_tk }}</td>
                                                <td>{{ $brand->article_tk}}</td>
                                                <td>{{ $brand->created_at }}</td>
                                                <td><img src="{{ $brand->getImage() }}"
                                                         class="img-fluid img-thumnail" width="130" alt=""></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Предложении пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $brands->links() }}
                        </div>
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
