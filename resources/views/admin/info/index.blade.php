@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('informations') }}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Список информация</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (count($informations) < 1)
                                <a href="{{ route('informations.create') }}" class="btn btn-primary mb-3">Добавить
                            информация</a>
                            @endif
                            @if (count($informations))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Action </th>
                                                <th>Телефон</th>
                                                <th>Электронное почта</th>
                                                <th>Адрес</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($informations as $information)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('informations.edit', ['information' => $information->id]) }}"
                                                            class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('informations.destroy', ['information' => $information->id]) }}"
                                                            method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>{{ $information->phone }}</td>
                                                    <td>{{ $information->email }}</td>
                                                    <td>{{ $information->adress }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Информация пока нет...</p>
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
