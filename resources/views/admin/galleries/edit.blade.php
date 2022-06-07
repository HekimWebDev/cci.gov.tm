@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid ml-3">
            <h6>{{ Breadcrumbs::render('galleryEdit', $gallery) }}</h6>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Редактировать галерею</h4>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" enctype="multipart/form-data"
                            action="{{ route('galleries.update', ['gallery' => $gallery->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Заголовок (русский)*</label>
                                    <input type="text" name="title" required
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Заголовок" value="{{ $gallery->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="title_tk">Заголовок (türkmen)*</label>
                                    <input type="text" name="title_tk" required
                                    class="form-control @error('title_tk') is-invalid @enderror" id="title_tk"
                                    placeholder="Заголовок" value="{{ $gallery->title_tk }}">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Заголовок (english)*</label>
                                    <input type="text" name="title_en" required
                                        class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                        placeholder="Заголовок" value="{{ $gallery->title_en }}">
                                </div>
                                <div>
                                    <img src="{{ $gallery->getImage() }}" class="img-thumbnail img-fluid" width="300"
                                        alt="">
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Изображение (обложка)*</label>
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label text-responsive @error('thumbnail') is-invalid @enderror"
                                            for="thumbnail">Выберите изображение</label>
                                    </div>
                                </div>
                                <div>
                                    <img id="img-preview" class="img-responsive img-thumbnail" width="300" src="" />
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="album">Изображении (альбом)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="album[]" accept="image/*" id="fileMulti"
                                                multiple="multiple" class="custom-file-input">
                                            <label class="custom-file-label" for="album">Выберите фотографии</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <span id="outputMulti"></span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-danger mr-1">Отменить</a>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        {{-- multipl --}}
        <script>
            function handleFileSelect(evt) {
                var files = evt.target.files; // FileList object
                // Loop through the FileList and render image files as thumbnails.
                for (var i = 0, f; f = files[i]; i++) {
                    // Only process image files.
                    if (!f.type.match('image.*')) {
                        alert("Image only please....");
                    }
                    var reader = new FileReader();
                    // Closure to capture the file information.
                    reader.onload = (function (theFile) {
                        return function (e) {
                            // Render thumbnail.
                            var span = document.createElement('span');
                            span.innerHTML = ['<img class="img-thumbnail" width="200" title="', escape(theFile
                                .name), '" src="', e
                                .target.result, '" />'
                            ].join('');
                            document.getElementById('outputMulti').insertBefore(span, null);
                        };
                    })(f);
                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
            }

            if (window.File && window.FileReader && window.FileList && window.Blob) {
                document.getElementById('fileMulti').addEventListener('change', handleFileSelect, false);
            } else {
                console.warn("Ваш браузер не поддерживает FileAPI")
            }
        </script>
    @endpush
@endsection
