@extends('layouts.app')
@section('title', 'Order | Detail')
@section('content')
    <div class="block-product">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.order.create') }}" class="btn btn-primary mb-3">Add order</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $orderDetail['id'] }}</td>
                            <td>{{ number_format($orderDetail['price']) }} VND</td>
                            <td>{{ $orderDetail['quantity'] }}</td>
                            <td>{{ $orderDetail['created_at'] }}</td>
                            <td>{{ $orderDetail['updated_at'] }}</td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
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
