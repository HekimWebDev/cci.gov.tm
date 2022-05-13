@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h6>{{ Breadcrumbs::render('tm_offer') }}</h6>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Список предложений</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('admin.biz-info.tm_offers.create') }}" class="btn btn-primary mb-3">Добавить
                                предложении</a>
                            @if (count($tm_offers))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Action </th>
                                                <th>№</th>
                                                <th>Имя</th>
                                                <th>Описания</th>
                                                <th>Дата</th>
                                                <th>Изображение</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tm_offers as $tm_offer)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.biz-info.tm_offers.edit', ['tm_offer' => $tm_offer->id]) }}"
                                                            class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.biz-info.tm_offers.destroy', ['tm_offer' => $tm_offer->id]) }}"
                                                            method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>{{ $tm_offer->number }}</td>
                                                    <td>{{ $tm_offer->name }}</td>
                                                    <td>{!! $tm_offer->desc !!}</td>
                                                    <td>{{ $tm_offer->datesingle }}</td>
                                                    <td><img src="{{ $tm_offer->getImage() }}"
                                                            class="img-fluid img-thumnail" width="130" alt=""></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Предложении пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $tm_offers->links() }}
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
