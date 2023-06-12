@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="block-product">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-12">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">
                    <i class="fa fa-plus me-3" aria-hidden="true"></i>Add product
                </a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>
                                <img class="img img-fluid" src="/storage/files/{{ $product['photos'][0] }}" alt="" width="100">
                            </td>
                            <td>{{ number_format($product['price']) }} VNĐ</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ $product['category']['name'] }}</td>
                            <td>{{ $product['created_at'] }}</td>
                            <td>{{ $product['updated_at'] }}</td>
                            <td>
                                <form action="{{ route('admin.product.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('admin.product.edit',$product->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>

</script>
