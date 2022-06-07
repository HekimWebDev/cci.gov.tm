@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        {{ Breadcrumbs::render('parcipants_eventsEdit', $parcipants) }}
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-created_at">{{ $parcipants->title }}</h3>
                    </div>
                    <!-- /.card-header -->

                    <form role="form" method="post" enctype="multipart/form-data"
                        action="{{ route('exhibition.parcipants_events.update', $parcipants->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="desc">Описание</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                                    rows="5" placeholder="Описание">{{ $parcipants->desc }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="desc_en">Описание (english)</label>
                                <textarea class="form-control @error('desc_en') is-invalid @enderror" name="desc_en" id="desc_en"
                                    rows="5" placeholder="english">{{ $parcipants->desc_en }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="desc_tk">Описание (türkmen)</label>
                                <textarea class="form-control @error('desc_tk') is-invalid @enderror" name="desc_tk" id="desc_tk"
                                    rows="5" placeholder="türkmen">{{ $parcipants->desc_tk }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-danger mr-1">Отменить</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@push('scripts')
    {{-- ckeditor --}}
    <script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>

    <script src="{{ asset('assets/admin/js/ckfinder-desc.js') }}"></script>
@endpush
@endsection
