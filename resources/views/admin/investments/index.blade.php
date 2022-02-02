@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('investments') }}
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Список страниц</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{ route('investments.create') }}" class="btn btn-primary mb-3">Добавить страниц</a>
                        @if (count($investments))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Action </th>
                                        <th>Заголовок</th>
                                        <th>Описания</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($investments as $investment)
                                    <tr>
                                        <td>
                                            <a href="{{ route('investments.edit', $investment->id) }}"
                                                class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form
                                                action="{{ route('investments.destroy', $investment->id) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $investment->name }}</td>
                                        <td>{!! Str::words($investment->desc, 10, '...')  !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p>Пока нечего нет...</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
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
