@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('partner') }}</h6>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Список партнеров</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('admin.biz-info.partners.create') }}" class="btn btn-primary mb-3">Добавить
                                партнера</a>
                            @if (count($partners))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Показать в главном странице</th>
                                                <th>Имя</th>
                                                <th>Заголовок</th>
                                                <th>Телефон</th>
                                                <th>Электронное почта</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($partners as $partner)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.biz-info.partners.show', $partner->id) }}"
                                                            class="btn btn-success btn-sm float-left mb-1 mr-1"
                                                            title="Осмотр">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <a href="{{ route('admin.biz-info.partners.edit', ['partner' => $partner->id]) }}"
                                                            class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('admin.biz-info.partners.destroy', ['partner' => $partner->id]) }}"
                                                            method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>{{ $partner->is_show }}</td>
                                                    <td>{{ $partner->name }}</td>
                                                    <td>{{ $partner->title }}</td>
                                                    <td>{{ $partner->phone }}</td>
                                                    <td>{{ $partner->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Партнеры пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $partners->links() }}
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
