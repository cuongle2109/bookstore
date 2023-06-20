@extends('layouts.app')
@section('title', 'User')
@section('content')
    <div class="block-home">
        <div>
            <img src="{{ asset('images/banner-gift.jpg') }}" class="img img-fluid mb-3" alt="#" width="100%">
            <a href="">
                <div id="imgThumbnailPreview">
                    <img src="{{ asset('storage/files/' . $banner->photo) }}" width="100%"/>

                </div>
            </a>
        </div>
        <form method="post" action="{{ route('admin.banner.update', 1) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <input id="files" type="file" name="files"
                       class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}"/>
                        @if($errors->has('photo'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['photo'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                <input type="hidden" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
@endsection
<script>
    window.onload = function () {

        //Check File API support
        if (window.File && window.FileList && window.FileReader) {
            var filesInput = document.getElementById("files");

            filesInput.addEventListener("change", function (event) {

                var files = event.target.files; //FileList object

                var data = new FormData();
                ;
                [].forEach.call(filesInput.files, function (file) {
                    data.append("files[]", file);
                });


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/save-multiple-files',
                    type: 'POST',
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('input[name="photo"]').val(data)
                    },
                    error: function (e) {
                        console.log(e)
                    }
                });

                var output = document.getElementById("imgThumbnailPreview");

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];

                    //Only pics
                    if (!file.type.match('image'))
                        continue;

                    var picReader = new FileReader();

                    picReader.addEventListener("load", function (event) {

                        var picSrc = event.target.result;
                        var imgThumbnailElem = `<img src='` + picSrc + `'` +
                            `title='` + file.name + `' class="img img-fluid" alt="#" width="100%">`;

                        output.innerHTML = imgThumbnailElem;

                    });

                    //Read the image
                    picReader.readAsDataURL(file);
                }

            });
        } else {
            console.error("Your browser does not support File API");
        }
    }
</script>
