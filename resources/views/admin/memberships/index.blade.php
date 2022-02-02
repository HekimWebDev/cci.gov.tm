@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('memberships') }}
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
                        <a href="{{ route('memberships.create') }}" class="btn btn-primary mb-3">Добавить страниц</a>
                        @if (count($memberships))
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
                                    @foreach($memberships as $membership)
                                    <tr>
                                        <td>
                                            <a href="{{ route('memberships.edit', $membership->id) }}"
                                                class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form
                                                action="{{ route('memberships.destroy', $membership->id) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $membership->title }}</td>
                                        <td>{!! Str::words($membership->desc, 10, '...')  !!}</td>
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
