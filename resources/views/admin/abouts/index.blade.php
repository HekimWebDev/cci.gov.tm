@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('abouts') }}
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Список</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{ route('abouts.create') }}" class="btn btn-primary mb-3">Добавить новую страницу </a>
                        @if (count($abouts))
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Заголовок</th>
                                            <th>Описания</th>
                                            <th>Изображение</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($abouts as $about)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('abouts.edit', $about->id) }}"
                                                        class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('abouts.destroy', $about->id) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ $about->title }}</td>
                                                <td>{!! Str::words($about->desc, 10, '...') !!}</td>
                                                <td><img src="{{ $about->getImage() }}" class="img-fluid img-thumnail"
                                                        width="130" alt=""></td>
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
                    <div class="card-footer clearfix">
                        {{ $abouts->links() }}
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
