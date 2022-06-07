$('#thumbnail').change(function () {
    var input = $(this)[0];
    if (input.files && input.files[0]) {
        if (input.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            console.log('ошибка, не изображение');
        }
    } else {
        console.log('хьюстон у нас проблема');
    }
});
$('#reset-img-preview').click(function () {
    $('#thumbnail').val('');
    $('#img-preview').attr('src', '');
});
$('#form').bind('reset', function () {
    $('#img-preview').attr('src', 'default-preview.jpg');
});


$('#thumbnail_en').change(function () {
    var input = $(this)[0];
    if (input.files && input.files[0]) {
        if (input.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-preview_en').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            console.log('ошибка, не изображение');
        }
    } else {
        console.log('хьюстон у нас проблема');
    }
});
$('#reset-img-preview').click(function () {
    $('#thumbnail_en').val('');
    $('#img-preview').attr('src', '');
});
$('#form').bind('reset', function () {
    $('#img-preview').attr('src', 'default-preview.jpg');
});


$('#thumbnail_tk').change(function () {
    var input = $(this)[0];
    if (input.files && input.files[0]) {
        if (input.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-preview_tk').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            console.log('ошибка, не изображение');
        }
    } else {
        console.log('хьюстон у нас проблема');
    }
});
$('#reset-img-preview').click(function () {
    $('#thumbnail_tk').val('');
    $('#img-preview').attr('src', '');
});
$('#form').bind('reset', function () {
    $('#img-preview').attr('src', 'default-preview.jpg');
});
