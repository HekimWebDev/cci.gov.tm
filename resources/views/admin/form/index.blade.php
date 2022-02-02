@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('form') }}
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Список вопросов</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (count($forms))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Action </th>
                                        <th>От</th>
                                        <th>Email</th>
                                        <th>Тема</th>
                                        <th>Сообщение</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($forms as $form)
                                    <tr>
                                        <td>
                                            <form
                                                action="{{ route('form.destroy', ['form' => $form->id]) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $form->info }}</td>
                                        <td>{{ $form->email }}</td>
                                        <td>{{ $form->theme }}</td>
                                        <td>{{ $form->message }}</td>
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
                        {{ $forms->links() }}
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
