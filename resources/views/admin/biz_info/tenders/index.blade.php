@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('tender') }}</h6>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Список тендеров</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('admin.biz-info.tenders.create') }}" class="btn btn-primary mb-3">Добавить
                                тендер</a>
                            @if (count($tenders))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Action   </th>
                                            <th>Заголовок</th>
                                            <th>Телефон</th>
                                            <th>Электронное почта</th>
                                            <th>Дата</th>
                                            <th>Организатор</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tenders as $tender)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.biz-info.tenders.show', $tender->id) }}"
                                                       class="btn btn-success btn-sm float-left mb-1 mr-1">
                                                        {{-- <i class="fas fa-eye"></i> --}}
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ route('admin.biz-info.tenders.edit', ['tender' => $tender->id]) }}"
                                                       class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin.biz-info.tenders.destroy', ['tender' => $tender->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ $tender->title }}</td>
                                                <td>{{ $tender->phone }}</td>
                                                <td>{{ $tender->email }}</td>
                                                <td>{{ $tender->datesingle }}</td>
                                                <td>{{ $tender->organizer }}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Категорий пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $tenders->links() }}
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

