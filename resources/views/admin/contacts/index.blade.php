@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{ Breadcrumbs::render('contacts') }}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Список контактов</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Добавить контакты</a>
                            @if (count($contacts))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Имя</th>
                                            <th>Телефон</th>
                                            <th>Факс</th>
                                            <th>Электронное почта</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contacts as $contact)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}"
                                                       class="btn btn-info btn-sm float-left mb-1 mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->faks }}</td>
                                                <td>{{ $contact->email }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Контакты пока нет...</p>
                            @endif
                        </div>
                        <div class="card-footer clearfix">
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

