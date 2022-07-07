@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <h5>{{ Breadcrumbs::render('news') }}</h5>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Список новостей</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Добавить
                            новость</a>
                        @if (count($news))
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
                                    @foreach($news as $n)
                                    <tr>
                                        <td>
                                            <a href="{{ route('news.edit', ['news' => $n->id]) }}"
                                                class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form
                                                action="{{ route('news.destroy', ['news' => $n->id]) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $n->title }}</td>
                                        <td>{!! Str::words($n->desc, 10, '...')  !!}</td>
                                        <td>{{ $n->publish_at }}</td>
                                        <td><img src="{{ $n->getImage() }}" class="img-fluid img-thumnail"
                                                width="130" alt=""></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p>Новасти пока нет...</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $news->links() }}
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
