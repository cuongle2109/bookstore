@extends('layouts.app')
@section('title', 'Product | Create')
@section('content')
    <div class="block-product">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
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
                        <label class="form-label">Select multiple files: </label>
                        <input id="files" type="file" name="files" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" multiple/>
                        @if($errors->has('photo'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['photo'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                        <input type="hidden" name="photo">
                    </div>
                    <div id="imgThumbnailPreview"></div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" name="price">
                        @if($errors->has('price'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['price'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}" name="quantity">
                        @if($errors->has('quantity'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['quantity'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Publisher</label>
                        <input type="text" class="form-control {{$errors->has('publisher') ? 'is-invalid' : ''}}" name="publisher">
                        @if($errors->has('publisher'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['publisher'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" class="form-control {{$errors->has('author') ? 'is-invalid' : ''}}" name="author">
                        @if($errors->has('author'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['author'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Discount</label>
                        <input type="number" class="form-control {{$errors->has('discount') ? 'is-invalid' : ''}}" name="discount">
                        @if($errors->has('discount'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['discount'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is Trending</label>
                        <div class="form-check form-switch  {{$errors->has('isTrending') ? 'is-invalid' : ''}}">
                            <input class="form-check-input isTrendingCheckChecked" type="checkbox">
                            <input type="hidden" name="isTrending" value="0">
                            <label class="form-check-label" for="isTrendingCheckChecked"></label>
                        </div>
                        @if($errors->has('isTrending'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['isTrending'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="editor" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
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
