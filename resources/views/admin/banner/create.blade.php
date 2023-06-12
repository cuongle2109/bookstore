@extends('layouts.app')
@section('title', 'User | Create')
@section('content')
    <div class="block-product">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['name'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['email'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['password'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm password</label>
                        <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation">
                        @if($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['password_confirmation'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" name="address">
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['address'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone">
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['phone'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <input type="hidden" name="isAdmin" value="0">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
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

                        var imgThumbnailElem = "<div class='imgThumbContainer'><div class='IMGthumbnail' ><img  src='" + picSrc + "'" +
                            "title='" + file.name + "'/><div></div>";

                        output.innerHTML = output.innerHTML + imgThumbnailElem;

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
