@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('branches') }}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Список предприятий</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('branches.create') }}" class="btn btn-primary mb-3">Добавить предприятие</a>
                            @if (count($branches))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Заголовок</th>
                                            <th>Телефон</th>
                                            <th>Факс</th>
                                            <th>Адрес</th>
                                            <th>Электронное почта</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($branches as $branch)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('branch.single', $branch->id) }}"
                                                       class="btn btn-success btn-sm float-left mb-1 mr-1" title="Осмотр">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('branches.edit', ['branch' => $branch->id]) }}"
                                                       class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('branches.destroy', ['branch' => $branch->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ $branch->title }}</td>
                                                <td>{{ $branch->phone }}</td>
                                                <td>{{ $branch->faks }}</td>
                                                <td>{{ $branch->adress }}</td>
                                                <td>{{ $branch->email }}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Предприятии пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $branches->links() }}
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

