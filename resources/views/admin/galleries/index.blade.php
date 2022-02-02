@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="ml-3">
                <h5>{{ Breadcrumbs::render('gallery') }}</h5>
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
                            <h4>Список изображении</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('galleries.create') }}" class="btn btn-primary mb-3">Добавить
                                изображение</a>
                            @if (count($galleries))
                                <div class=" row">
                                    @foreach ($galleries as $gallery)
                                        <div class="card col-6 col-sm-2 col-md-3 mb-4">
                                            <img src="{{ $gallery->getImage() }}" style="" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $gallery->title }}</h5>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted align-items-center d-flex justify-content-center">
                                                    <a href="{{ route('album', ['id' => $gallery->id]) }}" role="button"
                                                        class="btn btn-success btn-sm float-left mb-1 mr-1">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ route('galleries.edit', ['gallery' => $gallery->id]) }}"
                                                        class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('galleries.destroy', $gallery->id) }}"
                                                        method="post" class="float-left mb-1 mr-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </small>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @else
                                <p>изображении пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $galleries->links() }}
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
