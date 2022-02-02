@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h5>{{ Breadcrumbs::render('carousel') }}</h5>
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
                            <a href="{{ route('carousels.create') }}" class="btn btn-primary mb-3">Добавить изображение</a>
                            @if (count($carousels))
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
                                            @foreach ($carousels as $carousel)
                                                <tr>
                                                    <td>
                                                        <form action="{{ route('carousels.destroy', $carousel->id) }}"
                                                            method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ asset("uploads/{$carousel->thumbnail}") }}">
                                                            <img src="{{ asset("uploads/{$carousel->thumbnail}") }}"
                                                                class="img-fluid img-thumnail" width="130" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ asset("uploads/{$carousel->thumbnail_en}") }}">
                                                            <img src="{{ asset("uploads/{$carousel->thumbnail_en}") }}"
                                                                class="img-fluid img-thumnail" width="130" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ asset("uploads/{$carousel->thumbnail_en}") }}">
                                                            <img src="{{ asset("uploads/{$carousel->thumbnail_tk}") }}"
                                                                class="img-fluid img-thumnail" width="130" alt="">
                                                        </a>
                                                    </td>
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
                            {{ $carousels->links() }}
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
