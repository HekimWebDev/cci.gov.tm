@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('parcipants_events') }}
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Список</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{ route('exhibition.parcipants_events.create') }}" class="btn btn-primary mb-3">Добавить новую страницу</a>
                        @if (count($parcipants))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Action </th>
                                        <th>Описания</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($parcipants as $parcipant)
                                    <tr>
                                        <td>
                                            <a href="{{ route('exhibition.parcipants_events.edit', $parcipant->id) }}"
                                                class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form
                                                action="{{ route('exhibition.parcipants_events.destroy', $parcipant->id) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{!! Str::words($parcipant->desc, 10, '...')  !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p>Пока нечего нет...</p>
                        @endif
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
