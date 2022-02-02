@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('banner') }}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Список изображений</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('banners.create') }}" class="btn btn-primary mb-3">Добавить изображение</a>
                            @if (count($banners))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Action </th>
                                                <th>Изображение_ru</th>
                                                <th>Изображение_en</th>
                                                <th>Изображение_tk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as $banner)
                                                <tr>
                                                    <td>
                                                        <form action="{{ route('banners.destroy', $banner->id) }}"
                                                            method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td><a href="{{ asset("uploads/{$banner->thumbnail}") }}"><img
                                                                src="{{ asset("uploads/{$banner->thumbnail}") }}"
                                                                class="img-fluid img-thumnail" width="130" alt=""></a></td>
                                                    <td><a href="{{ asset("uploads/{$banner->thumbnail_en}") }}"><img
                                                                src="{{ asset("uploads/{$banner->thumbnail_en}") }}"
                                                                class="img-fluid img-thumnail" width="130" alt=""></a></td>
                                                    <td><a href="{{ asset("uploads/{$banner->thumbnail_en}") }}">
                                                            <img src="{{ asset("uploads/{$banner->thumbnail_tk}") }}"
                                                                class="img-fluid img-thumnail" width="130" alt=""></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Баннеров пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $banners->links() }}
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
