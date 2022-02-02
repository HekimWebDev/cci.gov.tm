@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Конференции</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Список страниц</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('conferences.create') }}" class="btn btn-primary mb-3">Добавить конференцию</a>
                            @if (count($conferences))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Имя</th>
                                            <th>Заголовок</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($conferences as $conference)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('conference.single', $conference->id) }}"
                                                       class="btn btn-success btn-sm float-left mb-1 mr-1" title="Осмотр">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('conferences.edit', ['conference' => $conference->id]) }}"
                                                       class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('conferences.destroy', ['conference' => $conference->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ $conference->name }}</td>
                                                <td>{{ $conference->title }}</td>
                                                <td>{{ $conference->date }}</td>

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
                            {{ $conferences->links() }}
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

